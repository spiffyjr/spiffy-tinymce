<?php

namespace SpiffyTinyMce;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\ServiceManager\ServiceManager;

class Manager extends AbstractPluginManager
{
    /**
     * {@inheritDoc}
     */
    public function validatePlugin($plugin)
    {
        if (!$plugin instanceof TinyMce) {
            throw new Exception\InvalidServiceException(sprintf(
                'Model of type %s is invalid; must implement %s\Model\ModelInterface',
                (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
                __NAMESPACE__
            ));
        }
    }
}