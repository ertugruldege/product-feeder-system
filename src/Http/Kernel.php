<?php

namespace ErtugrulDege\ProductFeederSystem\Http;

use ErtugrulDege\ProductFeederSystem\Http\Request;

class Kernel
{
    public static $routes = [];

    public static function get($routeName, mixed $callable)
    {
        if (is_array($callable)) {
            $callable = static::newCallableFromClassString($callable);
        }

        static::$routes['GET'][] = [trim($routeName, '/'), $callable];
    }

    public static function post($routeName, mixed $callable)
    {
        if (is_array($callable)) {
            $callable = static::newCallableFromClassString($callable);
        }

        static::$routes['POST'][] = [trim($routeName, '/'), $callable];
    }

    public static function handle(Request $request)
    {
        $path = $request->path();
        $method = $request->method();

        foreach (static::$routes[$method] as $route) {
            $routeName = $route[0];
            $routeCallable = $route[1];
            if ($routeName == $path) {
                echo $routeCallable($request);
                return;
            }elseif (strpos($routeName, '{') !== false) {
                $matches = [];
                preg_match_all('/{(.*?)}/', $routeName, $matches);
                foreach ($matches as $match) {
                    if (strpos($match[0],'{') === false) {
                        $paramSegments = explode("/", parse_url($path, PHP_URL_PATH));
                        $routeSegments = explode("/", parse_url($routeName, PHP_URL_PATH));

                        $routeName = preg_replace('/{(.*?)}/', $match[0], $path);
                        $newRouteSegments = explode("/", parse_url($routeName, PHP_URL_PATH));

                        if ($paramSegments == $newRouteSegments) {
                            foreach ($routeSegments as $key => $value){
                                if (strpos($value, '{') !== false) {
                                    $value = str_replace(['{','}'], '', $value);
                                    if (isset($paramSegments[$key])) {
                                        $request->$value = $paramSegments[$key];
                                    }
                                }
                            }
                        }
                    }
                }
                echo $routeCallable($request);
                return;
            }
        }
    }

    protected static function newCallableFromClassString(array $classArgs)
    {
        $className = $classArgs[0];
        $methodName = $classArgs[1];
        $newInstanceFromClassName = new $className;

        return function ($request) use ($newInstanceFromClassName, $methodName) {
            return call_user_func_array([$newInstanceFromClassName, $methodName], [$request]);
        };
    }
}
