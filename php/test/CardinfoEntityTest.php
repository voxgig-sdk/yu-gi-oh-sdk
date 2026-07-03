<?php
declare(strict_types=1);

// Cardinfo entity test

require_once __DIR__ . '/../yugioh_sdk.php';
require_once __DIR__ . '/Runner.php';

use PHPUnit\Framework\TestCase;
use Voxgig\Struct\Struct as Vs;

class CardinfoEntityTest extends TestCase
{
    public function test_create_instance(): void
    {
        $testsdk = YuGiOhSDK::test(null, null);
        $ent = $testsdk->Cardinfo(null);
        $this->assertNotNull($ent);
    }

    public function test_basic_flow(): void
    {
        $setup = cardinfo_basic_setup(null);
        // Per-op sdk-test-control.json skip.
        $_live = !empty($setup["live"]);
        foreach (["list"] as $_op) {
            [$_shouldSkip, $_reason] = Runner::is_control_skipped("entityOp", "cardinfo." . $_op, $_live ? "live" : "unit");
            if ($_shouldSkip) {
                $this->markTestSkipped($_reason ?? "skipped via sdk-test-control.json");
                return;
            }
        }
        // The basic flow consumes synthetic IDs from the fixture. In live mode
        // without an *_ENTID env override, those IDs hit the live API and 4xx.
        if (!empty($setup["synthetic_only"])) {
            $this->markTestSkipped("live entity test uses synthetic IDs from fixture — set YUGIOH_TEST_CARDINFO_ENTID JSON to run live");
            return;
        }
        $client = $setup["client"];

        // Bootstrap entity data from existing test data.
        $cardinfo_ref01_data_raw = Vs::items(Helpers::to_map(
            Vs::getpath($setup["data"], "existing.cardinfo")));
        $cardinfo_ref01_data = null;
        if (count($cardinfo_ref01_data_raw) > 0) {
            $cardinfo_ref01_data = Helpers::to_map($cardinfo_ref01_data_raw[0][1]);
        }

        // LIST
        $cardinfo_ref01_ent = $client->Cardinfo(null);
        $cardinfo_ref01_match = [];

        [$cardinfo_ref01_list_result, $err] = $cardinfo_ref01_ent->list($cardinfo_ref01_match, null);
        $this->assertNull($err);
        $this->assertIsArray($cardinfo_ref01_list_result);

    }
}

function cardinfo_basic_setup($extra)
{
    Runner::load_env_local();

    $entity_data_file = __DIR__ . '/../../.sdk/test/entity/cardinfo/CardinfoTestData.json';
    $entity_data_source = file_get_contents($entity_data_file);
    $entity_data = json_decode($entity_data_source, true);

    $options = [];
    $options["entity"] = $entity_data["existing"];

    $client = YuGiOhSDK::test($options, $extra);

    // Generate idmap.
    $idmap = [];
    foreach (["cardinfo01", "cardinfo02", "cardinfo03"] as $k) {
        $idmap[$k] = strtoupper($k);
    }

    // Detect ENTID env override before envOverride consumes it. When live
    // mode is on without a real override, the basic test runs against synthetic
    // IDs from the fixture and 4xx's. Surface this so the test can skip.
    $entid_env_raw = getenv("YUGIOH_TEST_CARDINFO_ENTID");
    $idmap_overridden = $entid_env_raw !== false && str_starts_with(trim($entid_env_raw), "{");

    $env = Runner::env_override([
        "YUGIOH_TEST_CARDINFO_ENTID" => $idmap,
        "YUGIOH_TEST_LIVE" => "FALSE",
        "YUGIOH_TEST_EXPLAIN" => "FALSE",
        "YUGIOH_APIKEY" => "NONE",
    ]);

    $idmap_resolved = Helpers::to_map(
        $env["YUGIOH_TEST_CARDINFO_ENTID"]);
    if ($idmap_resolved === null) {
        $idmap_resolved = Helpers::to_map($idmap);
    }

    if ($env["YUGIOH_TEST_LIVE"] === "TRUE") {
        $merged_opts = Vs::merge([
            [
                "apikey" => $env["YUGIOH_APIKEY"],
            ],
            $extra ?? [],
        ]);
        $client = new YuGiOhSDK(Helpers::to_map($merged_opts));
    }

    $live = $env["YUGIOH_TEST_LIVE"] === "TRUE";
    return [
        "client" => $client,
        "data" => $entity_data,
        "idmap" => $idmap_resolved,
        "env" => $env,
        "explain" => $env["YUGIOH_TEST_EXPLAIN"] === "TRUE",
        "live" => $live,
        "synthetic_only" => $live && !$idmap_overridden,
        "now" => (int)(microtime(true) * 1000),
    ];
}
