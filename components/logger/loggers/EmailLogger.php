<?php

namespace app\components\logger\loggers;

use app\components\logger\interfaces\LoggerHandlerInterface;
use Yii;

class EmailLogger implements LoggerHandlerInterface
{
    private const EMAIL_FROM = 'no-reply@example.com';
    private const EMAIL_TO = 'to@example.com';

    public function handle(string $message): void
    {
        $emailFrom = Yii::$app->params['logEmailFrom'] ?? self::EMAIL_FROM;
        $emailTo = Yii::$app->params['logEmailTo'] ?? self::EMAIL_TO;

        $mailer = Yii::$app->mailer;

        try {
            $mailer->compose()
                ->setFrom($emailFrom)
                ->setTo($emailTo)
                ->setSubject('Log Message')
                ->setTextBody($message)
                ->send();

            echo "Email sent successfully: $message\n";
        } catch (\Exception $e) {
            echo "Error sending email: " . $e->getMessage() . "\n";
        }
    }
}