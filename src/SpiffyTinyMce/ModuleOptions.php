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
     * Whether or not to use jQuery by default. Each instance can override this setting.
     *
     * @var bool
     */
    protected $useJquery = false;

    /**
     * URL of the tiny mce script if useJquery is enabled in the TinyMCE instance.
     *
     * @var string
     */
    protected $scriptUrl = '/js/tinymce/tinymce.min.js';

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

    /**
     * @param string $scriptUrl
     * @return $this
     */
    public function setScriptUrl($scriptUrl)
    {
        $this->scriptUrl = $scriptUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getScriptUrl()
    {
        return $this->scriptUrl;
    }

    /**
     * @param boolean $useJquery
     * @return $this
     */
    public function setUseJquery($useJquery)
    {
        $this->useJquery = $useJquery;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getUseJquery()
    {
        return $this->useJquery;
    }
}