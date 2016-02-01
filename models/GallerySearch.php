<?php

namespace app\modules\gallery\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\gallery\models\GalleryRecord;

/**
 * GallerySearch represents the model behind the search form about `app\modules\gallery\models\GalleryRecord`.
 */
class GallerySearch extends GalleryRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'model_id', 'type', 'direct_access', 'author_id', 'is_main', 'position', 'created_at', 'updated_at'], 'integer'],
            [['module', 'model', 'title', 'description', 'content'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
    * @inheritdoc
    */
    public function filters($query)
    {
        $query->andFilterWhere([
            'id' => $this->id,
            'model_id' => $this->model_id,
            'type' => $this->type,
            'direct_access' => $this->direct_access,
            'author_id' => $this->author_id,
            'is_main' => $this->is_main,
            'position' => $this->position,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'module', $this->module])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'content', $this->content]);
    }

}
