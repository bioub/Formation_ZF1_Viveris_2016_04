<?php

return [
    'service_manager' => [
        'factories' => [
            'Application\Gateway\Contact' => \Application\Gateway\ContactGatewayFactory::class,
            'Application\Mapper\Contact' => \Application\Mapper\ContactMapperFactory::class,
            'Application\Service\Contact' => \Application\Service\ContactServiceFactory::class,
        ],
    ],
];