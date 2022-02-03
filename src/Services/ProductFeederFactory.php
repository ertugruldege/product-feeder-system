<?php 

namespace ErtugrulDege\ProductFeederSystem\Services;

use ErtugrulDege\ProductFeederSystem\Contracts\ProductFeederInterface;
use ErtugrulDege\ProductFeederSystem\Services\GoogleJSONProductFeeder;
use ErtugrulDege\ProductFeederSystem\Services\GoogleXMLProductFeeder;
use ErtugrulDege\ProductFeederSystem\Services\FacebookJSONProductFeeder;
use ErtugrulDege\ProductFeederSystem\Services\FacebookXMLProductFeeder;

class ProductFeederFactory 
{
    public static function make($provider, $type): ProductFeederInterface
    {
        switch($provider){
            case 'google'   : return ($type == 'xml') 
                                ? new GoogleXMLProductFeeder() 
                                : new GoogleJSONProductFeeder();
                                break;
            case 'facebook' : return ($type == 'xml') 
                                ? new FacebookXMLProductFeeder() 
                                : new FacebookJSONProductFeeder();
                                break;
            default: 
                throw new \InvalidArgumentException('invalid argument: $provider must be one of google or facebook');
        }
    }
}