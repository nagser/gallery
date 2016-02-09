<?php

namespace nagser\logger\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property string $id
 * @property integer $level
 * @property string $category
 * @property double $log_time
 * @property string $prefix
 * @property string $message
 */

class LoggerSearch extends LoggerRecord
{
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id', 'level'], 'integer'],
			[['category'], 'string'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function filters($query)
	{
		$query->andFilterWhere([
			'id' => $this->id,
			'category' => $this->category,
			'level' => $this->level,
		]);
		$query->andFilterWhere(['like', 'category', $this->category])
			->andFilterWhere(['like', 'level', $this->level])
			->andFilterWhere(['like', 'id', $this->id]);
	}
}