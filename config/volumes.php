<?php
use craft\volumes\AwsS3Volume;
use craft\fs\S3;

return [
    'uploads' => [
        'name' => 'Uploads',
        'handle' => 'uploads',
        'type' => AwsS3Volume::class,
        'fs' => [
            'type' => S3::class,
            'settings' => [
                'keyId' => getenv('AWS_KEY_ID'),          // AWS Access Key
                'secret' => getenv('AWS_SECRET'),         // AWS Secret Key
                'bucket' => getenv('AWS_BUCKET'),        // Bucket name
                'region' => getenv('AWS_REGION'),        // e.g. ap-southeast-2
                'path' => getenv('AWS_PATH'),            // e.g. 019c5698-033c-71e2-85c4-d6e84a4989b5/assets
                'url' => getenv('ASSET_BASE_URL'),       // e.g. https://bucket.s3.region.amazonaws.com/
                'useSignedUrls' => true,                  // Enable signed URLs
            ],
        ],
        'hasUrls' => true,
        'url' => getenv('ASSET_BASE_URL'),
        'fieldLayout' => [],
    ],
];
