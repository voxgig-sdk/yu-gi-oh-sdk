<?php
declare(strict_types=1);

// YuGiOh SDK utility: prepare_body

class YuGiOhPrepareBody
{
    public static function call(YuGiOhContext $ctx): mixed
    {
        if ($ctx->op->input === 'data') {
            return ($ctx->utility->transform_request)($ctx);
        }
        return null;
    }
}
