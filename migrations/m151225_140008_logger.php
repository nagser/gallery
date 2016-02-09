<?php

use yii\db\Schema;
use yii\db\Migration;

class m151225_140008_logger extends Migration
{
    public function up()
    {
        $tableOptions = 'ENGINE=InnoDB';
        if(!Yii::$app->db->schema->getTableSchema('log')){
            $this->createTable('{{%log}}',
                [
                    'id' => Schema::TYPE_BIGPK . '',
                    'level' => Schema::TYPE_INTEGER . '(11)',
                    'category' => Schema::TYPE_STRING . '(255)',
                    'log_time' => Schema::TYPE_INTEGER . '(11)',
                    'prefix' => Schema::TYPE_TEXT . '',
                    'message' => Schema::TYPE_TEXT . '',
                ], $tableOptions);
            $this->createIndex('idx_log_level', '{{%log}}', 'level', 0);
            $this->createIndex('idx_log_category', '{{%log}}', 'category', 0);
        }
    }

    public function down()
    {
        $this->dropTable('{{%log}}');
    }
}
