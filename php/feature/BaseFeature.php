<?php
declare(strict_types=1);

// YuGiOh SDK base feature

class YuGiOhBaseFeature
{
    public string $version;
    public string $name;
    public bool $active;

    // Positions this feature when added via the client `extend` option:
    // "__before__" / "__after__" / "__replace__" name an already-added
    // feature (mirrors the ts feature `_options`). Declared so setting it
    // on an extension instance avoids the dynamic-property deprecation.
    public ?array $_options = null;

    public function __construct()
    {
        $this->version = '0.0.1';
        $this->name = 'base';
        $this->active = true;
    }

    public function get_version(): string { return $this->version; }
    public function get_name(): string { return $this->name; }
    public function get_active(): bool { return $this->active; }

    public function init(YuGiOhContext $ctx, array $options): void {}
    public function PostConstruct(YuGiOhContext $ctx): void {}
    public function PostConstructEntity(YuGiOhContext $ctx): void {}
    public function SetData(YuGiOhContext $ctx): void {}
    public function GetData(YuGiOhContext $ctx): void {}
    public function GetMatch(YuGiOhContext $ctx): void {}
    public function SetMatch(YuGiOhContext $ctx): void {}
    public function PrePoint(YuGiOhContext $ctx): void {}
    public function PreSpec(YuGiOhContext $ctx): void {}
    public function PreRequest(YuGiOhContext $ctx): void {}
    public function PreResponse(YuGiOhContext $ctx): void {}
    public function PreResult(YuGiOhContext $ctx): void {}
    public function PreDone(YuGiOhContext $ctx): void {}
    public function PreUnexpected(YuGiOhContext $ctx): void {}
}
