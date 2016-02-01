<?php

namespace app\modules\gallery\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property string $id
 * @property string $module
 * @property string $model
 * @property integer $model_id
 * @property integer $type
 * @property string $title
 * @property string $description
 * @property string $content
 * @property integer $direct_access
 * @property integer $author_id
 * @property integer $is_main
 * @property integer $position
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $author
 */
class GalleryRecord extends \app\base\models\CustomRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id', 'type', 'direct_access', 'author_id', 'is_main', 'position', 'created_at', 'updated_at'], 'integer'],
            [['description', 'content'], 'string'],
            [['type', 'title', 'content', 'author_id'], 'required'],
            [['module', 'model', 'title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('gallery', 'ID'),
            'module' => Yii::t('gallery', 'Module'),
            'model' => Yii::t('gallery', 'Model'),
            'model_id' => Yii::t('gallery', 'Model ID'),
            'type' => Yii::t('gallery', 'Type'),
            'title' => Yii::t('gallery', 'Title'),
            'description' => Yii::t('gallery', 'Description'),
            'content' => Yii::t('gallery', 'Content'),
            'direct_access' => Yii::t('gallery', 'Direct access'),
            'author_id' => Yii::t('gallery', 'Author'),
            'is_main' => Yii::t('gallery', 'Is main'),
            'position' => Yii::t('gallery', 'Position'),
            'created_at' => Yii::t('gallery', 'Created At'),
            'updated_at' => Yii::t('gallery', 'Updated At'),
        ];
    }

    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['upload'] = ['type', 'content', 'author_id'];
        return $scenarios;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }
}
