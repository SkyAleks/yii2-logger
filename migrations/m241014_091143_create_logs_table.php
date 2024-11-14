<?php

use yii\db\Migration;


class m241014_091143_create_logs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('logs', [
            'id' => $this->primaryKey(),
            'message' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('logs');
    }
}
