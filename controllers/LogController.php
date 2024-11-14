<?php

namespace app\controllers;

use app\components\logger\enums\LoggerType;
use Yii;
use yii\web\Controller;
use app\components\logger\Logger;

class LogController extends Controller
{
    public function actionLog()
    {
        $message = Yii::$app->request->post('message', 'Default log message');

        $logger = new Logger();
        $logger->send($message);
    }

    /**
     * @param string $type
     */
    public function actionLogTo(string $type)
    {
        $message = Yii::$app->request->post('message', 'Log message to special logger');

        $logger = new Logger($type);
        $logger->send($message);
    }

    public function actionLogToAll()
    {
        $message = Yii::$app->request->post('message', 'Log message to all loggers');

        $loggers = LoggerType::cases();

        foreach ($loggers as $type) {
            $logger = new Logger($type->value);
            $logger->send($message);
        }
    }
}
