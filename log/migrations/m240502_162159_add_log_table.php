<?php

use log\models\Log;
use yii\db\Migration;

class m240502_162159_add_log_table extends Migration
{
    public function safeUp()
    {
        $this->createTable(Log::tableName(), [
            'id' => $this->primaryKey(),
            'message' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('current_timestamp()'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable(Log::tableName());
    }
}
