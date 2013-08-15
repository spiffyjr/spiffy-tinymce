<?php

namespace SpiffyTinyMce;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TinyMceAbstractFactory implements AbstractFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return null !== $this->getConfig($serviceLocator, $requestedName);
    }

    /**
     * {@inheritDoc}
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $config = $this->getConfig($serviceLocator, $requestedName);
        $tiny   = new TinyMce($requestedName, $config);

        return $tiny;

    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @param string $name
     * @return array|null
     */
    protected function getConfig(ServiceLocatorInterface $serviceLocator, $name)
    {
        /** @var \SpiffyTinyMce\Manager $serviceLocator */
        $sl     = $serviceLocator->getServiceLocator();
        $config = $sl->get('Configuration');
        $config = $config['spiffy_tinymce'];

        return isset($config['instances'][$name]) ? $config['instances'][$name] : null;
    }
}