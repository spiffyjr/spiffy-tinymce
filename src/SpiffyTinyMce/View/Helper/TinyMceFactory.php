<?php

namespace SpiffyTinyMce\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TinyMceFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return TinyMce
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Zend\View\HelperPluginManager $serviceLocator */
        $sl = $serviceLocator->getServiceLocator();

        return new TinyMce($sl->get('SpiffyTinyMce\Manager'));
    }
}