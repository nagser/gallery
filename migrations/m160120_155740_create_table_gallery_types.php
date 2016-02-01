<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_155740_create_table_gallery_types extends Migration
{
    public function up()
    {
        $tableOptions = 'ENGINE=InnoDB';
        if(!Yii::$app->db->schema->getTableSchema('galleryTypes')){
            $this->createTable('{{%galleryTypes}}',
                [
                    'id' => Schema::TYPE_BIGPK . '',
                    'title' => Schema::TYPE_STRING . '(255)',
                    'description' => Schema::TYPE_TEXT . '',
                    'icon' => Schema::TYPE_STRING . '(255)',
                    'created_at' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                    'updated_at' => Schema::TYPE_INTEGER . '(11) NOT NULL',
                ], $tableOptions);
            $this->createIndex('id', '{{%galleryTypes}}', ['id'], 1);
        }
    }

    public function down()
    {
        $this->dropTable('{{%galleryTypes}}');
    }
}
