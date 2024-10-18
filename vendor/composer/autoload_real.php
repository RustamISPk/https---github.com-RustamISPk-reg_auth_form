<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderIniteafa423fb0f66f17b347a79632cd3019
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

        spl_autoload_register(array('ComposerAutoloaderIniteafa423fb0f66f17b347a79632cd3019', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderIniteafa423fb0f66f17b347a79632cd3019', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticIniteafa423fb0f66f17b347a79632cd3019::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
