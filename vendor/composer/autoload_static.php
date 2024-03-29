<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit446c7b9bfde20c251584978d11f518b0
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit446c7b9bfde20c251584978d11f518b0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit446c7b9bfde20c251584978d11f518b0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit446c7b9bfde20c251584978d11f518b0::$classMap;

        }, null, ClassLoader::class);
    }
}
