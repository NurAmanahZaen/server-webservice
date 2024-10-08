<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitca14ddbcff965f88bc1d5ee2e4e41b0c
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitca14ddbcff965f88bc1d5ee2e4e41b0c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitca14ddbcff965f88bc1d5ee2e4e41b0c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitca14ddbcff965f88bc1d5ee2e4e41b0c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
