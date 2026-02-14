<?php

use craft\helpers\App;

return [
    'id' => App::env('CRAFT_APP_ID') ?: 'CraftCMS',

    'components' => [
        'cache' => function () {
            return Craft::createObject([
                'class' => \yii\caching\FileCache::class,
            ]);
        },
    ],
];
