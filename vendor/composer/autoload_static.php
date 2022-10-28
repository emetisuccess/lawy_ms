<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc12a92b8a4860ccefd9cc01a71b0c30a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc12a92b8a4860ccefd9cc01a71b0c30a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc12a92b8a4860ccefd9cc01a71b0c30a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc12a92b8a4860ccefd9cc01a71b0c30a::$classMap;

        }, null, ClassLoader::class);
    }
}