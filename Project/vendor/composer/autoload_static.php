<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit260a7750aec2710b09fa51ea7c0bb003
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Phoenix\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Phoenix\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit260a7750aec2710b09fa51ea7c0bb003::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit260a7750aec2710b09fa51ea7c0bb003::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit260a7750aec2710b09fa51ea7c0bb003::$classMap;

        }, null, ClassLoader::class);
    }
}
