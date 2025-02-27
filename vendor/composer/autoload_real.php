<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit283b4d0ab00e997127f03351c214dfbd
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit283b4d0ab00e997127f03351c214dfbd', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit283b4d0ab00e997127f03351c214dfbd', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit283b4d0ab00e997127f03351c214dfbd::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
