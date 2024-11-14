<?php

namespace app\components\logger;

use app\components\logger\interfaces\LoggerInterface;
use app\components\logger\LoggerFactory;
use Yii;

class Logger implements LoggerInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @param ?string $type
     */
    public function __construct(?string $type = null)
    {
        $this->type = $type ?? Yii::$app->params['defaultLogger'];
    }

    /**
     * @param string $message
     * @param string $loggerType
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->setType($loggerType);
        $logHandler = LoggerFactory::getLogger($this->type);
        $logHandler->handle($message);
    }


    /**
     * @param string $message
     */
    public function send(string $message): void
    {
        $logHandler = LoggerFactory::getLogger($this->type);
        $logHandler->handle($message);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
