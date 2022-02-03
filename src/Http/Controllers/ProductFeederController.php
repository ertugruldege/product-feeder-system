<?php

namespace ErtugrulDege\ProductFeederSystem\Http\Controllers;

use ErtugrulDege\ProductFeederSystem\Http\Request;
use ErtugrulDege\ProductFeederSystem\Services\ProductFeederFactory;

class ProductFeederController extends Controller
{
    public function index(Request $request)
    {
        $type = 'json';
        if(in_array($request->http_accept(),['application/xml','text/xml'])){
            $type = 'xml';
        }
        try {
            $provider = (isset($request->provider)) ? $request->provider : 'google';
            $feederInstance = ProductFeederFactory::make($provider, $type);
        } catch (\InvalidArgumentException $exception) {
            return $this->response(json_encode(['message' => $exception->getMessage()]), 400);
        }
        

        return $this->response($feederInstance->feed(), 200, $request->http_accept);
    }
}
