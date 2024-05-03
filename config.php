<?php
$config = [
    'logger' => [
        'class' => \log\components\Logger::class,
        'type' => 'file',
        'targets' => [
            'db' => [
                'class' => \log\channels\Db::class,
                'modelClass' => \log\models\Log::class,
            ],
            'email' => [
                'class' => \log\channels\Email::class,
                'emailTo' => 'aaaaa@aa.ua',
            ],
            'file' => [
                'class' => \log\channels\File::class,
                'fileName' => 'log_file.txt',
            ],
        ]
    ],
];