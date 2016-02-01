<?php

use yii\db\Schema;
use yii\db\Migration;

class m160120_164251_create_gallery_galleryTypes_relations extends Migration
{
    public function up()
    {
        if(Yii::$app->db->schema->getTableSchema('gallery') and Yii::$app->db->schema->getTableSchema('galleryTypes')){
            $this->addForeignKey('fk_type_id_type_id', '{{%gallery}}', 'type', 'galleryTypes', 'id');
        } else {
            echo 'Gallery or galleryTypes table does not exits!';
        }
    }

    public function down()
    {
        $this->dropForeignKey('fk_type_id_type_id', '{{%gallery}}');
    }

}
