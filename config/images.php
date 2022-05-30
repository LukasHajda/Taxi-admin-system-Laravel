<?php

/**
 * Structure of Config file: namespace > image_type > attribute
 *
 * namespace - if missing, _default is used
 * image_type (image|thumb) - if missing, not created, use: image_type => true for _default settings
 * width, height - if missing, _default is used
 * transformtion (scale|crop) - if missing, no transformation is applied
 */

return [
    'examples' => [
        'image' => [
            'width' => 1200,
            'height' => 800,
            'transformation' => 'scale',
        ],
        'thumb' => [
            'width' => 400,
            'height' => 400,
            'transformation' => 'crop',
        ]
    ],

    'users' => [
        'image' => [
            'width' => 1200,
            'height' => 800,
            'transformation' => 'scale',
        ],
        'thumb' => [
            'width' => 400,
            'height' => 400,
            'transformation' => 'crop',
        ]
    ],

    // Default settings
    '_default' => [
        'image' => [
            'width' => 1200,
            'height' => 800,
            'transformation' => 'scale'
        ],
        'thumb' => [
            'width' => 400,
            'height' => 400,
            'transformation' => 'crop'
        ],
    ],
];
