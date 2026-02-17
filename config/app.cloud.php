<?php
use craft\helpers\App;

return [
    'id' => App::env('CRAFT_APP_ID') ?: 'CraftCMS',

    // Force FileCache globally
    'components' => [
        'cache' => function () {
            return Craft::createObject([
                'class' => \yii\caching\FileCache::class,
            ]);
        },
    ],

    // Disable all plugins for Cloud
    'bootstrap' => [],
];
