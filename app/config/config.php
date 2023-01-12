<?php
    chdir(dirname(__DIR__));
    // Config Loader
    $f3->instance()->config("app/config/config.ini");   

    $f3->set('DB', new \DB\SQL('mysql:host=127.0.0.1;port=3306;dbname=skripsipemantauan;charset=utf8',
        'root',
        '', [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ])
    );