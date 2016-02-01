<?php

namespace app\modules\gallery\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "galleryTypes".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $icon
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Gallery[] $galleries
 */
class GalleryTypes extends \app\base\models\CustomRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'galleryTypes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['title', 'icon'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('gallery', 'ID'),
            'title' => Yii::t('gallery', 'Title'),
            'description' => Yii::t('gallery', 'Description'),
            'icon' => Yii::t('gallery', 'Icon'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getGalleries()
//    {
//        return $this->hasMany(Gallery::className(), ['type' => 'id']);
//    }

    public function asList(){
        $list = self::find()->asArray()->all();
        return ArrayHelper::map($list, 'id', 'title');
    }
}
