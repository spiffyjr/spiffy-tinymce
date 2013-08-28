<?php

namespace SpiffyTinyMce\Annotation\TinyMce;

use SpiffyConfig\Annotation\Service;

/**
 * @Annotation
 */
class Factory extends Service\Factory
{
    /**
     * @var string
     */
    public $key = 'spiffy_tinymce|manager';
}
