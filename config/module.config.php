<?php

return array(
    'spiffy_tinymce' => array(
        'manager' => array(
            'abstract_factories' => array(
                'SpiffyTinyMce\TinyMceAbstractFactory'
            ),
        ),

        'instances' => array()
    ),

    'service_manager' => include 'service.config.php',

    'view_helpers' => array(
        'factories' => array(
            'tinymce' => 'SpiffyTinyMce\View\Helper\TinyMceFactory'
        )
    )
);