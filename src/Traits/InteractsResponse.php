<?php

namespace ErtugrulDege\ProductFeederSystem\Traits;

trait InteractsResponse
{
    public function response($data, $statusCode = 200, $contentType = 'application/json')
    {
        header('Content-Type', $contentType);
        http_response_code($statusCode);
        return $data;
    }
}
