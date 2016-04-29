<?php

return [
    'controllers' => [
        'invokables' => [
            'Application\Controller\Index' => \Application\Controller\IndexController::class,
        ],
        'factories' => [
            'Application\Controller\Contact' => \Application\Controller\ContactControllerFactory::class,
        ]
    ],
];