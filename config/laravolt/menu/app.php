<?php

return [
    'App' => [
        'order' => 99,
        'menu' => [
            'Sensor' => [
                'route' => 'sensor.index',
                'active' => 'sensor/*',
                'icon' => 'sensor',
            ],
            'Hardware' => [
                'route' => 'hardware.index',
                'active' => 'hardware/*',
                'icon' => 'server',
            ],
            'Hardware Detail' => [
                'route' => 'hardware-detail.index',
                'active' => 'hardware-detail/*',
                'icon' => 'microchip',
            ],
            'Laporan' => [
                'route' => 'laporan',
                'active' => 'laporan/*',
                'icon' => 'file-chart-line',
            ],
        ],
    ],
];
