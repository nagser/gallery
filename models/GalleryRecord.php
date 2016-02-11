<?php

namespace nagser\gallery\models;

use nagser\base\models\Model;
use nagser\users\behaviors\AuthorBehavior;
use nagser\users\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "gallery".
 *
 * @property string $id
 * @property string $module
 * @property string $model
 * @property integer $model_id
 * @property integer $type
 * @property string $title
 * @property string $file
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $author
 */
class GalleryRecord extends Model
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
            [['module', 'model', 'title'], 'string', 'max' => 255],
            [['file'], 'file', 'skipOnEmpty' => false, ]
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
            'file' => Yii::t('gallery', 'File'),
            'created_at' => Yii::t('gallery', 'Created At'),
            'updated_at' => Yii::t('gallery', 'Updated At'),
        ];
    }

    public function behaviors(){

        return ArrayHelper::merge(parent::behaviors(), [
            'TimestampBehavior' => ['class' => TimestampBehavior::className()],
            'AuthorBehavior' => ['class' => AuthorBehavior::className()]
        ]);
    }

    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['save'] = ['module', 'model', 'title'];
        return $scenarios;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * Валидация и загрузка файла
     * @return bool
     * */
    public function upload()
    {
        if ($this->validate()) {
            $file = $this->file;
            /** @var $file \yii\web\UploadedFile * */
//            $file->saveAs(Yii::getAlias('@galleryOriginalPath') . '/' . $file->baseName . '.' . $file->extension);
//            Yii::$app->gallery->upload($file);
            $this->file = $file->baseName . '.' . $file->extension;
            $this->type = $file->type;
            return true;
        } else {
            return false;
        }
    }
}
