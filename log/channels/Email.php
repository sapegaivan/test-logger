<?php

namespace log\channels;

use Yii;
use yii\base\Exception;

class Email extends AbstractChannel
{
    public string $emailTo;

    public function write(string $message): void
    {
        if (empty($this->emailTo)) {
            throw new Exception('Need to set email address.');
        }
        Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['adminEmail'] ?? '')
            ->setTo($this->emailTo)
            ->setTextBody($message)
            ->send();

        \Yii::$app->response->data .= "'$message' was send to email<br>";
    }
}