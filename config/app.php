<?php

use craft\helpers\App;
use Craft;

return [
    'id' => App::env('CRAFT_APP_ID') ?: 'CraftCMS',

    // Environment-specific settings
    'bootstrap' => App::env('CRAFT_ENVIRONMENT') === 'production' 
        ? []   // Disable all plugins on production/Cloud
        : null, // Keep plugins enabled locally

    'components' => [
        // Use file cache instead of DB cache in production
        'cache' => function () {
            if (App::env('CRAFT_ENVIRONMENT') === 'production') {
                return Craft::createObject([
                    'class' => \yii\caching\FileCache::class,
                ]);
            }
            // Default cache for local/dev
            return Craft::createObject([
                'class' => \craft\cache\DbCache::class,
            ]);
        },
    ],
];
