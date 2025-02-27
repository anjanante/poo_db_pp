<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit283b4d0ab00e997127f03351c214dfbd
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit283b4d0ab00e997127f03351c214dfbd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit283b4d0ab00e997127f03351c214dfbd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit283b4d0ab00e997127f03351c214dfbd::$classMap;

        }, null, ClassLoader::class);
    }
}
