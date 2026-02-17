<?php

use craft\helpers\App;
use Craft;

return [
    'id' => App::env('CRAFT_APP_ID') ?: 'CraftCMS',

    'bootstrap' => [],

    'components' => [
        'cache' => function () {
            if (App::env('CRAFT_ENVIRONMENT') === 'production') {
                return Craft::createObject([
                    'class' => \yii\caching\FileCache::class,
                ]);
            }

            return Craft::createObject([
                'class' => \craft\cache\DbCache::class,
            ]);
        },
    ],
];
