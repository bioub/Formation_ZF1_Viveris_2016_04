<?php

return [
    'db' => [
        'driver' => 'Pdo_mysql',
        'hostname' => 'localhost',
        'port' => 3306,
        'dbname' => 'viveris',
        'user' => 'root',
        'password' => '',
        'charset' => 'UTF8'
    ],
    'service_manager' => [
        'factories' => [
            'Zend\Db\Adapter\Adapter' => \Zend\Db\Adapter\AdapterServiceFactory::class
        ]
    ],
];