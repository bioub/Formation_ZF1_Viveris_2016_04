<?php

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => \Zend\Mvc\Router\Http\Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => 'Application\Controller\Index',
                        'action' => 'index',
                    ],
                ],
            ],
            'contact' => [
                'type' => \Zend\Mvc\Router\Http\Literal::class,
                'options' => [
                    'route' => '/contact',
                    'defaults' => [
                        'controller' => 'Application\Controller\Contact',
                        'action' => 'list'
                    ]
                ]
            ],
        ],
    ],
];
