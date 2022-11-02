<?php

namespace Cardio\Controller\Factory;

use Cardio\Controller\LoginController;
use Cardio\Model\UserTable;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class LoginControllerFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new LoginController(
            $container->get(UserTable::class)
        );

    }
}