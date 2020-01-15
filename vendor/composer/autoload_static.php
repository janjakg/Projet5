<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcb4da7b17582a4c25a3bea865a0d6b79
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Structure\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Structure\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
    );

    public static $classMap = array (
        'Structure\\Manager' => __DIR__ . '/../..' . '/model/Manager.php',
        'Structure\\PostManager' => __DIR__ . '/../..' . '/model/postManager.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcb4da7b17582a4c25a3bea865a0d6b79::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcb4da7b17582a4c25a3bea865a0d6b79::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcb4da7b17582a4c25a3bea865a0d6b79::$classMap;

        }, null, ClassLoader::class);
    }
}
