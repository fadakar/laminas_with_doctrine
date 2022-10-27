<?php

namespace Application\Controller\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Application\Controller\IndexController;

class FactoryController
{
    public function __invoke(ContainerInterface $container)
    {
        return new IndexController($container->get(EntityManager::class));
    }
}