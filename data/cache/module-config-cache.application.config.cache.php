<?php
return [
    'service_manager' => [
        'abstract_factories' => [
            'Laminas\\Db\\Adapter\\AdapterAbstractServiceFactory'
        ],
        'factories' => [
            'Laminas\\Db\\Adapter\\AdapterInterface' => 'Laminas\\Db\\Adapter\\AdapterServiceFactory',
            'Laminas\\Router\\Http\\TreeRouteStack' => 'Laminas\\Router\\Http\\HttpRouterFactory',
            'Laminas\\Router\\RoutePluginManager' => 'Laminas\\Router\\RoutePluginManagerFactory',
            'Laminas\\Router\\RouteStackInterface' => 'Laminas\\Router\\RouterFactory',
            'Laminas\\Validator\\ValidatorPluginManager' => 'Laminas\\Validator\\ValidatorPluginManagerFactory'
        ],
        'aliases' => [
            'Laminas\\Db\\Adapter\\Adapter' => 'Laminas\\Db\\Adapter\\AdapterInterface',
            'Zend\\Db\\Adapter\\AdapterInterface' => 'Laminas\\Db\\Adapter\\AdapterInterface',
            'Zend\\Db\\Adapter\\Adapter' => 'Laminas\\Db\\Adapter\\Adapter',
            'HttpRouter' => 'Laminas\\Router\\Http\\TreeRouteStack',
            'router' => 'Laminas\\Router\\RouteStackInterface',
            'Router' => 'Laminas\\Router\\RouteStackInterface',
            'RoutePluginManager' => 'Laminas\\Router\\RoutePluginManager',
            'Zend\\Router\\Http\\TreeRouteStack' => 'Laminas\\Router\\Http\\TreeRouteStack',
            'Zend\\Router\\RoutePluginManager' => 'Laminas\\Router\\RoutePluginManager',
            'Zend\\Router\\RouteStackInterface' => 'Laminas\\Router\\RouteStackInterface',
            'ValidatorManager' => 'Laminas\\Validator\\ValidatorPluginManager',
            'Zend\\Validator\\ValidatorPluginManager' => 'Laminas\\Validator\\ValidatorPluginManager'
        ]
    ],
    'route_manager' => [],
    'router' => [
        'routes' => [
            'home' => [
                'type' => 'Laminas\\Router\\Http\\Literal',
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => 'Application\\Controller\\IndexController',
                        'action' => 'index'
                    ]
                ]
            ],
            'application' => [
                'type' => 'Laminas\\Router\\Http\\Segment',
                'options' => [
                    'route' => '/application[/:action]',
                    'defaults' => [
                        'controller' => 'Application\\Controller\\IndexController',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'laminas-developer-tools' => '/var/www/vendor/laminas/laminas-developer-tools/config/../view',
            0 => '/var/www/module/Application/config/../view'
        ],
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => '/var/www/module/Application/config/../view/layout/layout.phtml',
            'application/index/index' => '/var/www/module/Application/config/../view/application/index/index.phtml',
            'error/404' => '/var/www/module/Application/config/../view/error/404.phtml',
            'error/index' => '/var/www/module/Application/config/../view/error/index.phtml'
        ]
    ],
    'controllers' => [
        'factories' => [
            'Application\\Controller\\IndexController' => 'Laminas\\ServiceManager\\Factory\\InvokableFactory'
        ]
    ]
];
