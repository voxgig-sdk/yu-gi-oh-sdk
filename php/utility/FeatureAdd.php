<?php
declare(strict_types=1);

// YuGiOh SDK utility: feature_add

class YuGiOhFeatureAdd
{
    public static function call(YuGiOhContext $ctx, mixed $f): void
    {
        $ctx->client->features[] = $f;
    }
}
