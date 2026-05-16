<?php
declare(strict_types=1);

// YuGiOh SDK feature factory

require_once __DIR__ . '/feature/BaseFeature.php';
require_once __DIR__ . '/feature/TestFeature.php';


class YuGiOhFeatures
{
    public static function make_feature(string $name)
    {
        switch ($name) {
            case "base":
                return new YuGiOhBaseFeature();
            case "test":
                return new YuGiOhTestFeature();
            default:
                return new YuGiOhBaseFeature();
        }
    }
}
