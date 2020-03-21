<?php
return [
    'database' => __DIR__ . '/../database',
    'database_data' => __DIR__ '/../database/html',
    'site_inf' => 'site-inf.xml',
    'menu_inf' => 'menu-inf.xml',
    'meta_inf' => 'meta-inf.xml',
    'user_inf' => 'user-inf.xml',
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
        'user-inf.xml',
    ],
];
