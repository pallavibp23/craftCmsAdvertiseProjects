<?php

use craft\helpers\App;
use Craft;

return [
    // Unique ID for session/caches
    'id' => App::env('CRAFT_APP_ID') ?: 'CraftCMS',

    // Components override
    'components' => [
        // Force FileCache globally to avoid DbCache recursion issues
        'cache' => function () {
            return Craft::createObject([
                'class' => \yii\caching\FileCache::class,
            ]);
        },
    ],

    // Environment-specific settings
    'bootstrap' => App::env('CRAFT_ENVIRONMENT') === 'production' 
        ? []   // Disable all plugins on Cloud/production temporarily
        : null, // Keep plugins enabled locally
];
