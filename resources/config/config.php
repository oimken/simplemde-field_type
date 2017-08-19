<?php

use Anomaly\FilesModule\Folder\Contract\FolderRepositoryInterface;

return [
    'height' => [
        'type'     => 'anomaly.field_type.integer',
        'required' => true,
        'config'   => [
            'default_value' => 300,
            'min'           => 200,
            'step'          => 50,
        ],
    ],
    'folder' => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'options' => function (FolderRepositoryInterface $folders) {
                return $folders->all()->pluck('name', 'id')->all();
            },
            'default_value' => ''
        ],
    ],
    'auto_grow' => [
        'type'     => 'anomaly.field_type.boolean',
        'config'   => [
            'default_value' => true
        ],
    ],
];
