<?php

namespace log\models;

/**
 * @property string $message
 */
class Log extends \yii\db\ActiveRecord
{
    public function rules()
    {
        return [
            ['message', 'required'],
        ];
    }
}