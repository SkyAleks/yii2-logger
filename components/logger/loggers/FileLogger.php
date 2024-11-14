<?php

namespace app\components\logger\loggers;

use app\components\logger\interfaces\LoggerHandlerInterface;
use Yii;
use yii\base\InvalidConfigException;

class FileLogger implements LoggerHandlerInterface
{
    protected string $filePath;

    public function __construct()
    {
        $this->filePath = Yii::$app->params['fileLoggerPath'] ?? Yii::getAlias('@runtime/logs/app.log');

        if (!is_writable(dirname($this->filePath))) {
            throw new InvalidConfigException("The directory for log file is not writable: " . dirname($this->filePath));
        }
    }

    /**
     * Записывает сообщение в файл.
     *
     * @param string $message
     */
    public function handle(string $message): void
    {
        $formattedMessage = date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL;
        file_put_contents($this->filePath, $formattedMessage, FILE_APPEND | LOCK_EX);
        echo "Message logged to file at {$this->filePath}: $message\n";
    }
}