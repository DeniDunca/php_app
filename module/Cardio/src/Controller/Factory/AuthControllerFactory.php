<?php

namespace Cardio\Controller\Factory;

use Cardio\Controller\AuthController;
use Cardio\Model\UserTable;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class AuthControllerFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
       return new AuthController(
           $container->get(UserTable::class)
       );
    }
}