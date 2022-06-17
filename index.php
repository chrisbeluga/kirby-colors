<?php

    Kirby::plugin('beluga/colors', [
        'fields' => [
            'colors' => [
                'props' => require_once __DIR__ . '/config/props.php',
            ]
        ],
        'fieldMethods' => require_once __DIR__ . '/config/methods.php',
    ]);
