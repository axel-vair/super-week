<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5392c6b503e7112b0e04d061827fe9b4
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\View\\' => 9,
            'App\\Model\\' => 10,
            'App\\Controller\\' => 15,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\View\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/View',
        ),
        'App\\Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Model',
        ),
        'App\\Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Controller',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5392c6b503e7112b0e04d061827fe9b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5392c6b503e7112b0e04d061827fe9b4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5392c6b503e7112b0e04d061827fe9b4::$classMap;

        }, null, ClassLoader::class);
    }
}
