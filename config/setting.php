<?php

return [
    'status' => [
        'inactive' => 0,
        'active' => 1
    ],
    'priority' => [
        'high' => 0,
        'medium' => 1,
        'low' => 2
    ],
    'priority_color' => [
        'high' => '#f2938d',
        'medium' => '#f79b11',
        'low' => '#b7f26f'
    ],
    'task_status' => [
        'to_do' => 0,
        'in_progress' => 1,
        'done' => 2,
        'testing' => 3,
        'completed' => 4,
        'deployed' => 5
    ],
    'task_status_color' => [
        'to_do' => '#6c757d',
        'in_progress' => '#007bff',
        'done' => '#17a2b8',
        'testing' => '#ffc107',
        'completed' => '#28a745',
        'deployed' => '#87CEEB'
    ],
    'bg_image' => [
        'path' => 'project/bg_image',
        'height' => '500',
        'width' => '1000',
        'size' => '1024'
    ],
    'avatar_image' => [
        'path' => 'project/avatar_image',
        'height' => '500',
        'width' => '500',
        'size' => '500'
    ],
    'default_banner' => 'img/default-banner.png',
    'default_image' => 'img/default.png'
];
