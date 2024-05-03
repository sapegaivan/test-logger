<?php

namespace log\channels;

use log\models\Log;
use yii\base\Exception;
use yii\db\BaseActiveRecord;

class Db extends AbstractChannel
{
    public string $modelClass = Log::class;

    public function write(string $message): void
    {
        if (empty($this->modelClass)) {
            throw new Exception('Need to set log model class.');
        }

        $model = new $this->modelClass();
        if (!($model instanceof BaseActiveRecord)) {
            throw new Exception('Provided class is not Active Record.');
        }

        $model->message = $message;
        if (!$model->save()) {
            throw new Exception($model->getFirstError('message'));
        }

        \Yii::$app->response->data .= "'$message' was send to db<br>";
    }
}