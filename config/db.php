<?php

$config = [

    "host"      => "localhost",
    "port"      => "3306",
    "database"  => "devbuild",
    "user"      => "root",
    "password"  => "",
    "options"   => [

        PDO::ATTR_TIMEOUT => 5,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]
    
];