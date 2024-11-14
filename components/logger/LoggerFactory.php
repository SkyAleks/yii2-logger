<?php

namespace app\components\logger;

use app\components\logger\loggers\EmailLogger;
use app\components\logger\loggers\DatabaseLogger;
use app\components\logger\loggers\FileLogger;
use app\components\logger\interfaces\LoggerHandlerInterface;
use app\components\logger\enums\LoggerType;
use Yii;

class LoggerFactory
{
    /**
     * @param string|null $type
     * @return LoggerHandlerInterface
     */
    public static function getLogger(string $type = null): LoggerHandlerInterface
    {
        $type = $type ?? LoggerType::from(Yii::$app->params['defaultLogger']);

        switch ($type) {
            case LoggerType::EMAIL->value:
                return new EmailLogger();

            case LoggerType::DATABASE->value:
                return new DatabaseLogger();

            case LoggerType::FILE->value:
            default:
                return new FileLogger();
        }
    }
}