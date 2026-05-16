<?php
declare(strict_types=1);

// YuGiOh SDK utility: result_headers

class YuGiOhResultHeaders
{
    public static function call(YuGiOhContext $ctx): ?YuGiOhResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result) {
            if ($response && is_array($response->headers)) {
                $result->headers = $response->headers;
            } else {
                $result->headers = [];
            }
        }
        return $result;
    }
}
