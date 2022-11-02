<?php

namespace Cardio\Controller\Factory;

use Cardio\Controller\PatientController;
use Cardio\Model\PatientTable;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class PatientControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new PatientController(
            $container->get(PatientTable::class)
        );

    }
}