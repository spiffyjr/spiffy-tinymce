<?php

namespace SpiffyTinyMce;

use Zend\Stdlib\AbstractOptions;

class TinyMce extends AbstractOptions
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $useJquery = false;

    /**
     * @var string
     */
    protected $selector = 'textarea';

    /**
     * @var array
     */
    protected $options = array();

    /**
     * @var array
     */
    protected $attributes = array();

    /**
     * @param string $name
     * @param null $options
     */
    public function __construct($name, $options = null)
    {
        $this->name = $name;
        parent::__construct($options);
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
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

    /**
     * @param string $selector
     * @return $this
     */
    public function setSelector($selector)
    {
        $this->selector = $selector;
        return $this;
    }

    /**
     * @return string
     */
    public function getSelector()
    {
        return $this->selector;
    }
}