<?php
declare(strict_types=1);

// YuGiOh SDK exists test

require_once __DIR__ . '/../yugioh_sdk.php';

use PHPUnit\Framework\TestCase;

class ExistsTest extends TestCase
{
    public function test_create_test_sdk(): void
    {
        $testsdk = YuGiOhSDK::test(null, null);
        $this->assertNotNull($testsdk);
    }
}
