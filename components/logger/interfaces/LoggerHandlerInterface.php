<?php
namespace app\components\logger\interfaces;
interface LoggerHandlerInterface {

    /**     *
     * @param string $message
     * @return void
     */
    public function handle(string $message): void;
}