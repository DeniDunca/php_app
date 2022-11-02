<?php

namespace Cardio;


use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;

return[
    'controllers' => [
        'factories' => [
            Controller\LoginController::class => Controller\Factory\LoginControllerFactory::class,
            Controller\AuthController::class => Controller\Factory\AuthControllerFactory::class,
            Controller\PatientController::class => Controller\Factory\PatientControllerFactory::class,
        ],
    ],

    'router' => [
        'routes' => [
            'login' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/login[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'signup' => [
                'type'    => Literal::class,
                'options' => [
                    'route' => '/signup',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action'     => 'add',
                    ],
                ],
            ],
            'welcome' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/welcome[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action'     => 'welcome',
                    ],
                ],
            ],
            'user' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/user[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'patient' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/patient[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PatientController::class,
                        'action'     => 'patient',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'user' => __DIR__ . '/../view',
            'login'=>__DIR__ . '/../view',
            'signup'=>__DIR__ . '/../view',
            'welcome'=>__DIR__ . '/../view',
            'patient'=>__DIR__ . '/../view',
        ],
    ],
];