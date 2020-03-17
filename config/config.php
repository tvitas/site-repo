<?php
return [
    'database' => sprintf('%s/../database', __DIR__),
    'database_data' => sprintf('%s/../database/html', __DIR__),
    'site_inf' => 'site-inf.xml',
    'menu_inf' => 'menu-inf.xml',
    'meta_inf' => 'meta-inf.xml',
    'contentMime' => [
        'text/plain',
        'text/html',
    ],
    'fileViewable' => [
        'image/png',
        'image/jpeg',
        'application/pdf',
    ],
    'reservedNames' => [
        'meta-inf',
        'footer',
        'header',
        'site-inf.xml',
        'menu-inf.xml',
        'meta-inf.xml',
    ],
];
