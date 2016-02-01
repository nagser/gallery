<?php

namespace app\modules\gallery\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\gallery\models\GalleryTypes;

/**
 * GalleryTypesSearch represents the model behind the search form about `app\modules\gallery\models\GalleryTypes`.
 */
class GalleryTypesSearch extends GalleryTypes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'description', 'icon'], 'safe'],
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'icon', $this->icon]);
    }

}
