<?php

    return [
        'colors' => function($field, $option = null) {

            if(!$field->value)
                return null;

            if($option === null || $option !== 'title' && $option !== 'hex' && $option !== 'class')
                throw new Exception('"title", "hex" or "class" required for option argument');

            $data = Yaml::decode($field->value);
            $response = $data[$option];

            return $response;

        }
    ];
