<?php

namespace log\channels;

use Yii;
use yii\base\Exception;

class File extends AbstractChannel
{
    public string $fileName;

    public function write(string $message): void
    {
        if (empty($this->fileName)) {
            throw new Exception('Need to set file name.');
        }
        $file = Yii::getAlias("@runtime/logs/{$this->fileName}");
        @file_put_contents($file, $message . PHP_EOL, FILE_APPEND | LOCK_EX);

        \Yii::$app->response->data .= "'$message' was send to file<br>";
    }
}