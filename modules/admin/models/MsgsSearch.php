<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Msgs;

/**
 * MsgsSearch represents the model behind the search form about `app\modules\admin\models\Msgs`.
 */
class MsgsSearch extends Msgs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'unit_type', 'unit_id', 'admin_id', 'time', 'param'], 'integer'],
            [['text'], 'safe'],
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
        $query = Msgs::find();

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
            'unit_type' => $this->unit_type,
            'unit_id' => $this->unit_id,
            'admin_id' => $this->admin_id,
            'time' => $this->time,
            'param' => $this->param,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
