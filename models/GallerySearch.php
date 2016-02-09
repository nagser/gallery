<?php

namespace nagser\gallery\models;

use Yii;
use yii\base\Model;

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
            [['id', 'model_id', 'author_id', 'created_at', 'updated_at'], 'integer'],
            [['module', 'model', 'title', 'type'], 'safe'],
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
//            'direct_access' => $this->direct_access,
            'author_id' => $this->author_id,
//            'is_main' => $this->is_main,
//            'position' => $this->position,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
//            'display' => 1,
        ]);

        $query->andFilterWhere(['like', 'module', $this->module])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'title', $this->title]);
//            ->andFilterWhere(['like', 'description', $this->description])
//            ->andFilterWhere(['like', 'content', $this->content]);
    }

}
