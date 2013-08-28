<?php

namespace SpiffyTinyMce\Annotation\TinyMce;

use SpiffyConfig\Annotation\Service;

/**
 * @Annotation
 */
class Invokable extends Service\Invokable
{
    /**
     * @var string
     */
    public $key = 'spiffy_tinymce|manager';
}
