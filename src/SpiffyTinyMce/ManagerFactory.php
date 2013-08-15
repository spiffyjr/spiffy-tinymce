<?php

namespace SpiffyTinyMce;

use Zend\ServiceManager\Config;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ManagerFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \SpiffyTinyMce\ModuleOptions $options */
        $options = $serviceLocator->get('SpiffyTinyMce\ModuleOptions');
        $manager = new Manager(new Config($options->getManager()));
        $manager->setServiceLocator($serviceLocator);

        return $manager;
    }
}