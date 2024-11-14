<?php

namespace app\components\logger\enums;

enum LoggerType: string
{
    case FILE = 'file';
    case EMAIL = 'email';
    case DATABASE = 'db';
}