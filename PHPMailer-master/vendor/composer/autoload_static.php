<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitebc0ab6a87d07f73da3f7a1fe479b820
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitebc0ab6a87d07f73da3f7a1fe479b820::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitebc0ab6a87d07f73da3f7a1fe479b820::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
