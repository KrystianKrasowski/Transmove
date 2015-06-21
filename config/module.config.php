<?php

return [
    'router' => [
        'routes' => [
            'sample' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/sample-move',
                    'defaults' => [
                        'controller' => 'TransmoveController',
                        'operations' => [
                            'say-hello', 'say-world', 'say-universe',
                        ],
                    ],
                ],
            ],
        ],
    ],

    'operation_manager' => [
        'say-hello' => 'Transmove\SayHello',
        'say-world' => 'Transmove\SayWorld',
        'say-universe' => 'Transmove\SayUniverse',
    ],

    'service_manager' => [
        'factories' => [
            'Transmove\OperationManager' => 'Transmove\Factory\OperationManagerFactory',
        ],
        'invokables' => [
            'Transmove\SayHello' => 'Transmove\Service\SayHello',
            'Transmove\SayWorld' => 'Transmove\Service\SayWorld',
            'Transmove\SayUniverse' => 'Transmove\Service\SayUniverse',
        ],
    ],

    'controllers' => [
        'invokables' => [
            'TransmoveController' => 'Transmove\Mvc\OperationController',
        ],
    ],
];