<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\T;

/**
 * TSearch represents the model behind the search form about `app\modules\admin\models\T`.
 */
class TSearch extends T
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'admin_id', 'type', 'time', 'invisible'], 'integer'],
            [['name', 'game', 'img', 'site', 'opisanie', 'color_table', 'color_text_unit', 'color_text_time', 'color_line', 'color_cell'], 'safe'],
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = T::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'admin_id' => $this->admin_id,
            'type' => $this->type,
            'time' => $this->time,
            'invisible' => $this->invisible,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'game', $this->game])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'opisanie', $this->opisanie])
            ->andFilterWhere(['like', 'color_table', $this->color_table])
            ->andFilterWhere(['like', 'color_text_unit', $this->color_text_unit])
            ->andFilterWhere(['like', 'color_text_time', $this->color_text_time])
            ->andFilterWhere(['like', 'color_line', $this->color_line])
            ->andFilterWhere(['like', 'color_cell', $this->color_cell]);

        return $dataProvider;
    }
}
