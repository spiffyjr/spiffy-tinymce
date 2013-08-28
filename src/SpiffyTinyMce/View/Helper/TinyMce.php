<?php

namespace SpiffyTinyMce\View\Helper;

use SpiffyTinyMce\Manager;
use SpiffyTinyMce\ModuleOptions;
use SpiffyTinyMce\TinyMce as Instance;
use Zend\Json\Json;
use Zend\View\Helper\AbstractHtmlElement;

class TinyMce extends AbstractHtmlElement
{
    /**
     * @var Manager
     */
    protected $manager;

    /**
     * @var ModuleOptions
     */
    protected $options;

    /**
     * @param Manager $manager
     * @param ModuleOptions $options
     */
    public function __construct(Manager $manager, ModuleOptions $options)
    {
        $this->manager = $manager;
        $this->options = $options;
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

    public function renderOptionsJs($name)
    {
        /** @var \SpiffyTinyMce\TinyMce $tiny */
        $tiny      = $this->manager->get($name);
        $options   = $tiny->getOptions();
        $useJquery = $tiny->getUseJquery() === true
            || ($tiny->getUseJquery() === null && $this->options->getUseJquery());

        if ($useJquery && !isset($options['script_url'])) {
            $options['script_url'] = $this->options->getScriptUrl();
        }

        if (empty($options)) {
            $options = (object) $options;
        }

        return Json::prettyPrint(json_encode($options), array('indent' => "    "));
    }

    public function renderJs($name)
    {
        $tiny     = $this->manager->get($name);
        $selector = $tiny->getSelector();

        if (!$selector) {
            $selector = $this->getSelector($name);
        }

        $js = '';
        if ($tiny->getUseJquery()) {
            $js = sprintf('$(function() { $("%s").tinymce(%s); });', $selector, $this->renderOptionsJs($name));
        }

        return $js;
    }

    public function injectJs($name)
    {
        $this->getView()->inlineScript()->appendScript($this->renderJs($name));
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