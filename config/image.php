<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    'size' => [
        'large' => [
            'width' => 750,
            'height' => 450
        ],
        'medium' => [
            'width' => 555,
            'height' => 333
        ],
        'small' => [
            'width' => 360,
            'height' => 216
        ],
        'extraSmall' => [
            'width' => 90,
            'height' => 90
        ]
    ]
];
