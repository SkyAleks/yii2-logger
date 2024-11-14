<?php

namespace app\models;

use yii\db\ActiveRecord;

class Logs extends ActiveRecord
{
    public static function tableName()
    {
        return 'logs';
    }

    public function rules()
    {
        return [
            [['message', 'created_at'], 'required'],
            [['message'], 'string'],
            [['created_at'], 'datetime'],
        ];
    }
}
