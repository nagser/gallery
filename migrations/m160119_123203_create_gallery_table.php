<?php

use yii\db\Schema;
use yii\db\Migration;

class m160119_123203_create_gallery_table extends Migration
{
    public function up()
    {
        $tableOptions = 'ENGINE=InnoDB';
        if(!Yii::$app->db->schema->getTableSchema('gallery')){
            $this->createTable('{{%gallery}}',
                [
                    'id' => Schema::TYPE_BIGPK . '',
                    'module' => Schema::TYPE_STRING . '(255)',
                    'model' => Schema::TYPE_STRING . '(255)',
                    'model_id' => Schema::TYPE_INTEGER . '(11)',
                    'type' => Schema::TYPE_STRING . '(255)',
                    'title' => Schema::TYPE_STRING . '(255)',
                    'file' => Schema::TYPE_STRING . '(255)',
                    'author_id' => Schema::TYPE_INTEGER . '(11)',
                    'created_at' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                    'updated_at' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                ], $tableOptions);
            $this->createIndex('id_module_model_model_id_type', '{{%gallery}}', ['id', 'module', 'model', 'model_id'], 1);
            $this->createIndex('id', '{{%gallery}}', ['id'], 1);
            $this->addForeignKey('fk_author_id_user_id', '{{%gallery}}', 'author_id', 'user', 'id');
        }
    }

    public function down()
    {
        $this->dropForeignKey('fk_author_id_user_id', '{{%gallery}}');
        $this->dropTable('{{%gallery}}');
    }

}
