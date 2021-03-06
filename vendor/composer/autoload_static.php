<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit034db29c8d8492ffae3ac83b896a6dc1
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'ErtugrulDege\\ProductFeederSystem\\' => 33,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ErtugrulDege\\ProductFeederSystem\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit034db29c8d8492ffae3ac83b896a6dc1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit034db29c8d8492ffae3ac83b896a6dc1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit034db29c8d8492ffae3ac83b896a6dc1::$classMap;

        }, null, ClassLoader::class);
    }
}
