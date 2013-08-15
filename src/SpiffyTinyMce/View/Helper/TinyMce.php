<?php

namespace SpiffyTinyMce\View\Helper;

use SpiffyTinyMce\Manager;
use SpiffyTinyMce\TinyMce as Instance;
use Zend\Json\Json;
use Zend\View\Helper\AbstractHtmlElement;

class TinyMce extends AbstractHtmlElement
{
    /**
     * @var \SpiffyTinyMce\Manager
     */
    protected $manager;

    /**
     * @param Manager $manager
     */
    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * {@inheritDoc}
     */
    public function __invoke($name = null)
    {
        if ($name) {
            $this->injectJs($name);
            return $this->renderHtml($name);
        }

        return $this;
    }

    public function renderHtml($name)
    {
        /** @var \SpiffyTinyMce\TinyMce $tiny */
        $tiny    = $this->manager->get($name);
        $attribs = $tiny->getAttributes();

        $attribs['id'] = $this->normalizeId(isset($attribs['id']) ? $attribs['id'] : $name);

        $this->injectJs($attribs['id'], $tiny);

        return '<textarea ' . $this->htmlAttribs($attribs) . '></textarea>';
    }

    public function injectJs($name)
    {
        $tiny     = $this->manager->get($name);
        $options  = $tiny->getOptions();
        $options  = Json::prettyPrint(json_encode($options), array('indent' => "    "));
        $selector = $tiny->getSelector();

        if (!$selector) {
            $selector = $this->getSelector($name);
        }

        $js = '';
        if ($tiny->getUseJquery()) {
            $js = sprintf('$(function() { $("%s").tinymce(%s); });', $selector, $options);
        }

        $this->getView()->inlineScript()->appendScript($js);
    }

    /**
     * @param string $name
     * @return string
     */
    protected function getSelector($name)
    {
        /** @var \SpiffyTinyMce\TinyMce $tiny */
        $tiny    = $this->manager->get($name);
        $attribs = $tiny->getAttributes();

        return $this->normalizeId(isset($attribs['id']) ? $attribs['id'] : '#' . $name);
    }
}