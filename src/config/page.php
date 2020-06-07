<?php

return [
    'route' => [
        'frontend' => 'routes/Api/Frontend',
        'backend' => 'routes/Api/Backend',
    ],
    'controller' => [
        'frontend' => 'app/Http/Controllers/Api/Frontend',
        'backend' => 'app/Http/Controllers/Api/Backend',
    ],
    'types' => [
        'privacy-policy' => 'privacy-policy',
        'terms-and-conditions' => 'terms-and-conditions',
    ],
    'view' => 'resources/views'
];
