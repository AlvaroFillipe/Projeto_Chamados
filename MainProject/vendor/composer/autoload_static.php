<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb722069bf8d952bbbac61f54d0fd17a1
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MF\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MF\\' => 
        array (
            0 => __DIR__ . '/..' . '/MF',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb722069bf8d952bbbac61f54d0fd17a1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb722069bf8d952bbbac61f54d0fd17a1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb722069bf8d952bbbac61f54d0fd17a1::$classMap;

        }, null, ClassLoader::class);
    }
}
