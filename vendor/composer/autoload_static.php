<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5b6c0fe805b484a5cd22ee0f2dbf7e8c
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5b6c0fe805b484a5cd22ee0f2dbf7e8c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5b6c0fe805b484a5cd22ee0f2dbf7e8c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
