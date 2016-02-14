<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Season;

/**
 * SeasonSearch represents the model behind the search form about `app\modules\admin\models\Season`.
 */
class SeasonSearch extends Season
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 't_id', 'type', 'time', 'admin_id', 'time_update', 'unit_type', 'score_open', 'invisible', 'zayavka_open', 'net_type', 'label'], 'integer'],
            [['name', 'time_action', 'unit1', 'unit2', 'unit3', 'unit4', 'unit5', 'unit6', 'unit7', 'unit8', 'unit9', 'unit10', 'unit11', 'unit12', 'unit13', 'unit14', 'unit15', 'unit16', 'unit17', 'unit18', 'unit19', 'unit20', 'unit21', 'unit22', 'unit23', 'unit24', 'unit25', 'unit26', 'unit27', 'unit28', 'unit29', 'unit30', 'unit31', 'unit32', 'uunit1', 'uunit2', 'uunit3', 'uunit4', 'uunit5', 'uunit6', 'uunit7', 'uunit8', 'uunit9', 'uunit10', 'uunit11', 'uunit12', 'uunit13', 'uunit14', 'uunit15', 'uunit16', 'uuunit1', 'uuunit2', 'uuunit3', 'uuunit4', 'uuunit5', 'uuunit6', 'uuunit7', 'uuunit8', 'uuuunit1', 'uuuunit2', 'uuuunit3', 'uuuunit4', 'uuuuunit1', 'uuuuunit2', 'unit_winner', 'score1', 'score2', 'score3', 'score4', 'score5', 'score6', 'score7', 'score8', 'score9', 'score10', 'score11', 'score12', 'score13', 'score14', 'score15', 'score16', 'score17', 'score18', 'score19', 'score20', 'score21', 'score22', 'score23', 'score24', 'score25', 'score26', 'score27', 'score28', 'score29', 'score30', 'score31', 'score32', 'sscore1', 'sscore2', 'sscore3', 'sscore4', 'sscore5', 'sscore6', 'sscore7', 'sscore8', 'sscore9', 'sscore10', 'sscore11', 'sscore12', 'sscore13', 'sscore14', 'sscore15', 'sscore16', 'ssscore1', 'ssscore2', 'ssscore3', 'ssscore4', 'ssscore5', 'ssscore6', 'ssscore7', 'ssscore8', 'sssscore1', 'sssscore2', 'sssscore3', 'sssscore4', 'ssssscore1', 'ssssscore2', 'time1', 'time2', 'time3', 'time4', 'time5', 'time6', 'time7', 'time8', 'time9', 'time10', 'time11', 'time12', 'time13', 'time14', 'time15', 'time16', 'ttime1', 'ttime2', 'ttime3', 'ttime4', 'ttime5', 'ttime6', 'ttime7', 'ttime8', 'tttime1', 'tttime2', 'tttime3', 'tttime4', 'ttttime1', 'ttttime2', 'time_final', 'unit3place1', 'unit3place2', 'unit3place3', 'score3place1', 'score3place2', 'time3place'], 'safe'],
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
        $query = Season::find();

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
            't_id' => $this->t_id,
            'type' => $this->type,
            'time' => $this->time,
            'admin_id' => $this->admin_id,
            'time_update' => $this->time_update,
            'unit_type' => $this->unit_type,
            'score_open' => $this->score_open,
            'invisible' => $this->invisible,
            'zayavka_open' => $this->zayavka_open,
            'net_type' => $this->net_type,
            'label' => $this->label,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'time_action', $this->time_action])
            ->andFilterWhere(['like', 'unit1', $this->unit1])
            ->andFilterWhere(['like', 'unit2', $this->unit2])
            ->andFilterWhere(['like', 'unit3', $this->unit3])
            ->andFilterWhere(['like', 'unit4', $this->unit4])
            ->andFilterWhere(['like', 'unit5', $this->unit5])
            ->andFilterWhere(['like', 'unit6', $this->unit6])
            ->andFilterWhere(['like', 'unit7', $this->unit7])
            ->andFilterWhere(['like', 'unit8', $this->unit8])
            ->andFilterWhere(['like', 'unit9', $this->unit9])
            ->andFilterWhere(['like', 'unit10', $this->unit10])
            ->andFilterWhere(['like', 'unit11', $this->unit11])
            ->andFilterWhere(['like', 'unit12', $this->unit12])
            ->andFilterWhere(['like', 'unit13', $this->unit13])
            ->andFilterWhere(['like', 'unit14', $this->unit14])
            ->andFilterWhere(['like', 'unit15', $this->unit15])
            ->andFilterWhere(['like', 'unit16', $this->unit16])
            ->andFilterWhere(['like', 'unit17', $this->unit17])
            ->andFilterWhere(['like', 'unit18', $this->unit18])
            ->andFilterWhere(['like', 'unit19', $this->unit19])
            ->andFilterWhere(['like', 'unit20', $this->unit20])
            ->andFilterWhere(['like', 'unit21', $this->unit21])
            ->andFilterWhere(['like', 'unit22', $this->unit22])
            ->andFilterWhere(['like', 'unit23', $this->unit23])
            ->andFilterWhere(['like', 'unit24', $this->unit24])
            ->andFilterWhere(['like', 'unit25', $this->unit25])
            ->andFilterWhere(['like', 'unit26', $this->unit26])
            ->andFilterWhere(['like', 'unit27', $this->unit27])
            ->andFilterWhere(['like', 'unit28', $this->unit28])
            ->andFilterWhere(['like', 'unit29', $this->unit29])
            ->andFilterWhere(['like', 'unit30', $this->unit30])
            ->andFilterWhere(['like', 'unit31', $this->unit31])
            ->andFilterWhere(['like', 'unit32', $this->unit32])
            ->andFilterWhere(['like', 'uunit1', $this->uunit1])
            ->andFilterWhere(['like', 'uunit2', $this->uunit2])
            ->andFilterWhere(['like', 'uunit3', $this->uunit3])
            ->andFilterWhere(['like', 'uunit4', $this->uunit4])
            ->andFilterWhere(['like', 'uunit5', $this->uunit5])
            ->andFilterWhere(['like', 'uunit6', $this->uunit6])
            ->andFilterWhere(['like', 'uunit7', $this->uunit7])
            ->andFilterWhere(['like', 'uunit8', $this->uunit8])
            ->andFilterWhere(['like', 'uunit9', $this->uunit9])
            ->andFilterWhere(['like', 'uunit10', $this->uunit10])
            ->andFilterWhere(['like', 'uunit11', $this->uunit11])
            ->andFilterWhere(['like', 'uunit12', $this->uunit12])
            ->andFilterWhere(['like', 'uunit13', $this->uunit13])
            ->andFilterWhere(['like', 'uunit14', $this->uunit14])
            ->andFilterWhere(['like', 'uunit15', $this->uunit15])
            ->andFilterWhere(['like', 'uunit16', $this->uunit16])
            ->andFilterWhere(['like', 'uuunit1', $this->uuunit1])
            ->andFilterWhere(['like', 'uuunit2', $this->uuunit2])
            ->andFilterWhere(['like', 'uuunit3', $this->uuunit3])
            ->andFilterWhere(['like', 'uuunit4', $this->uuunit4])
            ->andFilterWhere(['like', 'uuunit5', $this->uuunit5])
            ->andFilterWhere(['like', 'uuunit6', $this->uuunit6])
            ->andFilterWhere(['like', 'uuunit7', $this->uuunit7])
            ->andFilterWhere(['like', 'uuunit8', $this->uuunit8])
            ->andFilterWhere(['like', 'uuuunit1', $this->uuuunit1])
            ->andFilterWhere(['like', 'uuuunit2', $this->uuuunit2])
            ->andFilterWhere(['like', 'uuuunit3', $this->uuuunit3])
            ->andFilterWhere(['like', 'uuuunit4', $this->uuuunit4])
            ->andFilterWhere(['like', 'uuuuunit1', $this->uuuuunit1])
            ->andFilterWhere(['like', 'uuuuunit2', $this->uuuuunit2])
            ->andFilterWhere(['like', 'unit_winner', $this->unit_winner])
            ->andFilterWhere(['like', 'score1', $this->score1])
            ->andFilterWhere(['like', 'score2', $this->score2])
            ->andFilterWhere(['like', 'score3', $this->score3])
            ->andFilterWhere(['like', 'score4', $this->score4])
            ->andFilterWhere(['like', 'score5', $this->score5])
            ->andFilterWhere(['like', 'score6', $this->score6])
            ->andFilterWhere(['like', 'score7', $this->score7])
            ->andFilterWhere(['like', 'score8', $this->score8])
            ->andFilterWhere(['like', 'score9', $this->score9])
            ->andFilterWhere(['like', 'score10', $this->score10])
            ->andFilterWhere(['like', 'score11', $this->score11])
            ->andFilterWhere(['like', 'score12', $this->score12])
            ->andFilterWhere(['like', 'score13', $this->score13])
            ->andFilterWhere(['like', 'score14', $this->score14])
            ->andFilterWhere(['like', 'score15', $this->score15])
            ->andFilterWhere(['like', 'score16', $this->score16])
            ->andFilterWhere(['like', 'score17', $this->score17])
            ->andFilterWhere(['like', 'score18', $this->score18])
            ->andFilterWhere(['like', 'score19', $this->score19])
            ->andFilterWhere(['like', 'score20', $this->score20])
            ->andFilterWhere(['like', 'score21', $this->score21])
            ->andFilterWhere(['like', 'score22', $this->score22])
            ->andFilterWhere(['like', 'score23', $this->score23])
            ->andFilterWhere(['like', 'score24', $this->score24])
            ->andFilterWhere(['like', 'score25', $this->score25])
            ->andFilterWhere(['like', 'score26', $this->score26])
            ->andFilterWhere(['like', 'score27', $this->score27])
            ->andFilterWhere(['like', 'score28', $this->score28])
            ->andFilterWhere(['like', 'score29', $this->score29])
            ->andFilterWhere(['like', 'score30', $this->score30])
            ->andFilterWhere(['like', 'score31', $this->score31])
            ->andFilterWhere(['like', 'score32', $this->score32])
            ->andFilterWhere(['like', 'sscore1', $this->sscore1])
            ->andFilterWhere(['like', 'sscore2', $this->sscore2])
            ->andFilterWhere(['like', 'sscore3', $this->sscore3])
            ->andFilterWhere(['like', 'sscore4', $this->sscore4])
            ->andFilterWhere(['like', 'sscore5', $this->sscore5])
            ->andFilterWhere(['like', 'sscore6', $this->sscore6])
            ->andFilterWhere(['like', 'sscore7', $this->sscore7])
            ->andFilterWhere(['like', 'sscore8', $this->sscore8])
            ->andFilterWhere(['like', 'sscore9', $this->sscore9])
            ->andFilterWhere(['like', 'sscore10', $this->sscore10])
            ->andFilterWhere(['like', 'sscore11', $this->sscore11])
            ->andFilterWhere(['like', 'sscore12', $this->sscore12])
            ->andFilterWhere(['like', 'sscore13', $this->sscore13])
            ->andFilterWhere(['like', 'sscore14', $this->sscore14])
            ->andFilterWhere(['like', 'sscore15', $this->sscore15])
            ->andFilterWhere(['like', 'sscore16', $this->sscore16])
            ->andFilterWhere(['like', 'ssscore1', $this->ssscore1])
            ->andFilterWhere(['like', 'ssscore2', $this->ssscore2])
            ->andFilterWhere(['like', 'ssscore3', $this->ssscore3])
            ->andFilterWhere(['like', 'ssscore4', $this->ssscore4])
            ->andFilterWhere(['like', 'ssscore5', $this->ssscore5])
            ->andFilterWhere(['like', 'ssscore6', $this->ssscore6])
            ->andFilterWhere(['like', 'ssscore7', $this->ssscore7])
            ->andFilterWhere(['like', 'ssscore8', $this->ssscore8])
            ->andFilterWhere(['like', 'sssscore1', $this->sssscore1])
            ->andFilterWhere(['like', 'sssscore2', $this->sssscore2])
            ->andFilterWhere(['like', 'sssscore3', $this->sssscore3])
            ->andFilterWhere(['like', 'sssscore4', $this->sssscore4])
            ->andFilterWhere(['like', 'ssssscore1', $this->ssssscore1])
            ->andFilterWhere(['like', 'ssssscore2', $this->ssssscore2])
            ->andFilterWhere(['like', 'time1', $this->time1])
            ->andFilterWhere(['like', 'time2', $this->time2])
            ->andFilterWhere(['like', 'time3', $this->time3])
            ->andFilterWhere(['like', 'time4', $this->time4])
            ->andFilterWhere(['like', 'time5', $this->time5])
            ->andFilterWhere(['like', 'time6', $this->time6])
            ->andFilterWhere(['like', 'time7', $this->time7])
            ->andFilterWhere(['like', 'time8', $this->time8])
            ->andFilterWhere(['like', 'time9', $this->time9])
            ->andFilterWhere(['like', 'time10', $this->time10])
            ->andFilterWhere(['like', 'time11', $this->time11])
            ->andFilterWhere(['like', 'time12', $this->time12])
            ->andFilterWhere(['like', 'time13', $this->time13])
            ->andFilterWhere(['like', 'time14', $this->time14])
            ->andFilterWhere(['like', 'time15', $this->time15])
            ->andFilterWhere(['like', 'time16', $this->time16])
            ->andFilterWhere(['like', 'ttime1', $this->ttime1])
            ->andFilterWhere(['like', 'ttime2', $this->ttime2])
            ->andFilterWhere(['like', 'ttime3', $this->ttime3])
            ->andFilterWhere(['like', 'ttime4', $this->ttime4])
            ->andFilterWhere(['like', 'ttime5', $this->ttime5])
            ->andFilterWhere(['like', 'ttime6', $this->ttime6])
            ->andFilterWhere(['like', 'ttime7', $this->ttime7])
            ->andFilterWhere(['like', 'ttime8', $this->ttime8])
            ->andFilterWhere(['like', 'tttime1', $this->tttime1])
            ->andFilterWhere(['like', 'tttime2', $this->tttime2])
            ->andFilterWhere(['like', 'tttime3', $this->tttime3])
            ->andFilterWhere(['like', 'tttime4', $this->tttime4])
            ->andFilterWhere(['like', 'ttttime1', $this->ttttime1])
            ->andFilterWhere(['like', 'ttttime2', $this->ttttime2])
            ->andFilterWhere(['like', 'time_final', $this->time_final])
            ->andFilterWhere(['like', 'unit3place1', $this->unit3place1])
            ->andFilterWhere(['like', 'unit3place2', $this->unit3place2])
            ->andFilterWhere(['like', 'unit3place3', $this->unit3place3])
            ->andFilterWhere(['like', 'score3place1', $this->score3place1])
            ->andFilterWhere(['like', 'score3place2', $this->score3place2])
            ->andFilterWhere(['like', 'time3place', $this->time3place]);

        return $dataProvider;
    }
}
