<?php
declare(strict_types=1);

// YuGiOh SDK utility: result_body

class YuGiOhResultBody
{
    public static function call(YuGiOhContext $ctx): ?YuGiOhResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result && $response && $response->json_func && $response->body) {
            $result->body = ($response->json_func)();
        }
        return $result;
    }
}
