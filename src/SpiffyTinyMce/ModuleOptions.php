<?php

namespace SpiffyTinyMce;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * Services to register with the manager.
     *
     * @var array
     */
    protected $manager = array();

    /**
     * An array of instances to register with the tinymce manager. This is handled by the
     * SpiffyTinyMce\TinyMceAbstractFactory.
     *
     * @var array
     */
    protected $instances = array();

    /**
     * @param array $manager
     * @return $this
     */
    public function setManager($manager)
    {
        $this->manager = $manager;
        return $this;
    }

    /**
     * @return array
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @param array $instances
     * @return $this
     */
    public function setInstances($instances)
    {
        $this->instances = $instances;
        return $this;
    }

    /**
     * @return array
     */
    public function getInstances()
    {
        return $this->instances;
    }
}