<?php

namespace app\components\logger\loggers;

use app\components\logger\interfaces\LoggerHandlerInterface;
use app\models\Logs;


class DatabaseLogger implements LoggerHandlerInterface
{
    public function handle(string $message): void
    {
        $log = new Logs();
        $log->message = $message;
        $log->created_at = date('Y-m-d H:i:s');

        if ($log->save()) {
            echo "Message logged to database: $message\n";
        } else {
            echo "Error saving log to database: " . implode(", ", $log->errors) . "\n";
        }
    }
}