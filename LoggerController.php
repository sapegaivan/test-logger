<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class LoggerController extends Controller
{
    public function actionLog()
    {
        $msg = Yii::$app->security->generateRandomString();
        Yii::$app->logger->send($msg);

    }

    public function actionLogTo(string $type): void
    {
        $msg = Yii::$app->security->generateRandomString();
        Yii::$app->logger->sendByLogger($msg, $type);
    }

    public function actionLogToAll(): void
    {
        foreach (Yii::$app->logger->getTargetTypesList() as $type) {
            $msg = Yii::$app->security->generateRandomString();
            Yii::$app->logger->sendByLogger($msg, $type);
        }
    }
}