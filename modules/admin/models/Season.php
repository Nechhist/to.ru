<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "season".
 *
 * @property integer $id
 * @property integer $t_id
 * @property integer $type
 * @property integer $time
 * @property integer $admin_id
 * @property integer $time_update
 * @property string $name
 * @property integer $unit_type
 * @property string $time_action
 * @property integer $score_open
 * @property integer $invisible
 * @property integer $zayavka_open
 * @property integer $net_type
 * @property integer $label
 * @property string $unit1
 * @property string $unit2
 * @property string $unit3
 * @property string $unit4
 * @property string $unit5
 * @property string $unit6
 * @property string $unit7
 * @property string $unit8
 * @property string $unit9
 * @property string $unit10
 * @property string $unit11
 * @property string $unit12
 * @property string $unit13
 * @property string $unit14
 * @property string $unit15
 * @property string $unit16
 * @property string $unit17
 * @property string $unit18
 * @property string $unit19
 * @property string $unit20
 * @property string $unit21
 * @property string $unit22
 * @property string $unit23
 * @property string $unit24
 * @property string $unit25
 * @property string $unit26
 * @property string $unit27
 * @property string $unit28
 * @property string $unit29
 * @property string $unit30
 * @property string $unit31
 * @property string $unit32
 * @property string $uunit1
 * @property string $uunit2
 * @property string $uunit3
 * @property string $uunit4
 * @property string $uunit5
 * @property string $uunit6
 * @property string $uunit7
 * @property string $uunit8
 * @property string $uunit9
 * @property string $uunit10
 * @property string $uunit11
 * @property string $uunit12
 * @property string $uunit13
 * @property string $uunit14
 * @property string $uunit15
 * @property string $uunit16
 * @property string $uuunit1
 * @property string $uuunit2
 * @property string $uuunit3
 * @property string $uuunit4
 * @property string $uuunit5
 * @property string $uuunit6
 * @property string $uuunit7
 * @property string $uuunit8
 * @property string $uuuunit1
 * @property string $uuuunit2
 * @property string $uuuunit3
 * @property string $uuuunit4
 * @property string $uuuuunit1
 * @property string $uuuuunit2
 * @property string $unit_winner
 * @property string $score1
 * @property string $score2
 * @property string $score3
 * @property string $score4
 * @property string $score5
 * @property string $score6
 * @property string $score7
 * @property string $score8
 * @property string $score9
 * @property string $score10
 * @property string $score11
 * @property string $score12
 * @property string $score13
 * @property string $score14
 * @property string $score15
 * @property string $score16
 * @property string $score17
 * @property string $score18
 * @property string $score19
 * @property string $score20
 * @property string $score21
 * @property string $score22
 * @property string $score23
 * @property string $score24
 * @property string $score25
 * @property string $score26
 * @property string $score27
 * @property string $score28
 * @property string $score29
 * @property string $score30
 * @property string $score31
 * @property string $score32
 * @property string $sscore1
 * @property string $sscore2
 * @property string $sscore3
 * @property string $sscore4
 * @property string $sscore5
 * @property string $sscore6
 * @property string $sscore7
 * @property string $sscore8
 * @property string $sscore9
 * @property string $sscore10
 * @property string $sscore11
 * @property string $sscore12
 * @property string $sscore13
 * @property string $sscore14
 * @property string $sscore15
 * @property string $sscore16
 * @property string $ssscore1
 * @property string $ssscore2
 * @property string $ssscore3
 * @property string $ssscore4
 * @property string $ssscore5
 * @property string $ssscore6
 * @property string $ssscore7
 * @property string $ssscore8
 * @property string $sssscore1
 * @property string $sssscore2
 * @property string $sssscore3
 * @property string $sssscore4
 * @property string $ssssscore1
 * @property string $ssssscore2
 * @property string $time1
 * @property string $time2
 * @property string $time3
 * @property string $time4
 * @property string $time5
 * @property string $time6
 * @property string $time7
 * @property string $time8
 * @property string $time9
 * @property string $time10
 * @property string $time11
 * @property string $time12
 * @property string $time13
 * @property string $time14
 * @property string $time15
 * @property string $time16
 * @property string $ttime1
 * @property string $ttime2
 * @property string $ttime3
 * @property string $ttime4
 * @property string $ttime5
 * @property string $ttime6
 * @property string $ttime7
 * @property string $ttime8
 * @property string $tttime1
 * @property string $tttime2
 * @property string $tttime3
 * @property string $tttime4
 * @property string $ttttime1
 * @property string $ttttime2
 * @property string $time_final
 * @property string $unit3place1
 * @property string $unit3place2
 * @property string $unit3place3
 * @property string $score3place1
 * @property string $score3place2
 * @property string $time3place
 */
class Season extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'season';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_id', 'time', 'admin_id', 'time_update', 'time_action', 'net_type', 'unit1', 'unit2', 'unit3', 'unit4', 'unit5', 'unit6', 'unit7', 'unit8', 'unit9', 'unit10', 'unit11', 'unit12', 'unit13', 'unit14', 'unit15', 'unit16', 'unit17', 'unit18', 'unit19', 'unit20', 'unit21', 'unit22', 'unit23', 'unit24', 'unit25', 'unit26', 'unit27', 'unit28', 'unit29', 'unit30', 'unit31', 'unit32', 'uunit1', 'uunit2', 'uunit3', 'uunit4', 'uunit5', 'uunit6', 'uunit7', 'uunit8', 'uunit9', 'uunit10', 'uunit11', 'uunit12', 'uunit13', 'uunit14', 'uunit15', 'uunit16', 'uuunit1', 'uuunit2', 'uuunit3', 'uuunit4', 'uuunit5', 'uuunit6', 'uuunit7', 'uuunit8', 'uuuunit1', 'uuuunit2', 'uuuunit3', 'uuuunit4', 'uuuuunit1', 'uuuuunit2', 'unit_winner', 'time1', 'time2', 'time3', 'time4', 'time5', 'time6', 'time7', 'time8', 'time9', 'time10', 'time11', 'time12', 'time13', 'time14', 'time15', 'time16', 'ttime1', 'ttime2', 'ttime3', 'ttime4', 'ttime5', 'ttime6', 'ttime7', 'ttime8', 'tttime1', 'tttime2', 'tttime3', 'tttime4', 'ttttime1', 'ttttime2', 'time_final', 'unit3place1', 'unit3place2', 'unit3place3', 'time3place'], 'required'],
            [['t_id', 'type', 'time', 'admin_id', 'time_update', 'unit_type', 'score_open', 'invisible', 'zayavka_open', 'net_type', 'label'], 'integer'],
            [['name', 'time1', 'time2', 'time3', 'time4', 'time5', 'time6', 'time7', 'time8', 'time9', 'time10', 'time11', 'time12', 'time13', 'time14', 'time15', 'time16', 'ttime1', 'ttime2', 'ttime3', 'ttime4', 'ttime5', 'ttime6', 'ttime7', 'ttime8', 'tttime1', 'tttime2', 'tttime3', 'tttime4', 'ttttime1', 'ttttime2', 'time_final'], 'string', 'max' => 16],
            [['time_action'], 'string', 'max' => 20],
            [['unit1', 'unit2', 'unit3', 'unit4', 'unit5', 'unit6', 'unit7', 'unit8', 'unit9', 'unit10', 'unit11', 'unit12', 'unit13', 'unit14', 'unit15', 'unit16', 'unit17', 'unit18', 'unit19', 'unit20', 'unit21', 'unit22', 'unit23', 'unit24', 'unit25', 'unit26', 'unit27', 'unit28', 'unit29', 'unit30', 'unit31', 'unit32', 'uunit1', 'uunit2', 'uunit3', 'uunit4', 'uunit5', 'uunit6', 'uunit7', 'uunit8', 'uunit9', 'uunit10', 'uunit11', 'uunit12', 'uunit13', 'uunit14', 'uunit15', 'uunit16', 'uuunit1', 'uuunit2', 'uuunit3', 'uuunit4', 'uuunit5', 'uuunit6', 'uuunit7', 'uuunit8', 'uuuunit1', 'uuuunit2', 'uuuunit3', 'uuuunit4', 'uuuuunit1', 'uuuuunit2', 'unit_winner', 'unit3place1', 'unit3place2', 'unit3place3', 'time3place'], 'string', 'max' => 12],
            [['score1', 'score2', 'score3', 'score4', 'score5', 'score6', 'score7', 'score8', 'score9', 'score10', 'score11', 'score12', 'score13', 'score14', 'score15', 'score16', 'score17', 'score18', 'score19', 'score20', 'score21', 'score22', 'score23', 'score24', 'score25', 'score26', 'score27', 'score28', 'score29', 'score30', 'score31', 'score32', 'sscore1', 'sscore2', 'sscore3', 'sscore4', 'sscore5', 'sscore6', 'sscore7', 'sscore8', 'sscore9', 'sscore10', 'sscore11', 'sscore12', 'sscore13', 'sscore14', 'sscore15', 'sscore16', 'ssscore1', 'ssscore2', 'ssscore3', 'ssscore4', 'ssscore5', 'ssscore6', 'ssscore7', 'ssscore8', 'sssscore1', 'sssscore2', 'sssscore3', 'sssscore4', 'ssssscore1', 'ssssscore2', 'score3place1', 'score3place2'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            't_id' => 'T ID',
            'type' => 'Type',
            'time' => 'Time',
            'admin_id' => 'Admin ID',
            'time_update' => 'Time Update',
            'name' => 'Name',
            'unit_type' => 'Unit Type',
            'time_action' => 'Time Action',
            'score_open' => 'Score Open',
            'invisible' => 'Invisible',
            'zayavka_open' => 'Zayavka Open',
            'net_type' => 'Net Type',
            'label' => 'Label',
            'unit1' => 'Unit1',
            'unit2' => 'Unit2',
            'unit3' => 'Unit3',
            'unit4' => 'Unit4',
            'unit5' => 'Unit5',
            'unit6' => 'Unit6',
            'unit7' => 'Unit7',
            'unit8' => 'Unit8',
            'unit9' => 'Unit9',
            'unit10' => 'Unit10',
            'unit11' => 'Unit11',
            'unit12' => 'Unit12',
            'unit13' => 'Unit13',
            'unit14' => 'Unit14',
            'unit15' => 'Unit15',
            'unit16' => 'Unit16',
            'unit17' => 'Unit17',
            'unit18' => 'Unit18',
            'unit19' => 'Unit19',
            'unit20' => 'Unit20',
            'unit21' => 'Unit21',
            'unit22' => 'Unit22',
            'unit23' => 'Unit23',
            'unit24' => 'Unit24',
            'unit25' => 'Unit25',
            'unit26' => 'Unit26',
            'unit27' => 'Unit27',
            'unit28' => 'Unit28',
            'unit29' => 'Unit29',
            'unit30' => 'Unit30',
            'unit31' => 'Unit31',
            'unit32' => 'Unit32',
            'uunit1' => 'Uunit1',
            'uunit2' => 'Uunit2',
            'uunit3' => 'Uunit3',
            'uunit4' => 'Uunit4',
            'uunit5' => 'Uunit5',
            'uunit6' => 'Uunit6',
            'uunit7' => 'Uunit7',
            'uunit8' => 'Uunit8',
            'uunit9' => 'Uunit9',
            'uunit10' => 'Uunit10',
            'uunit11' => 'Uunit11',
            'uunit12' => 'Uunit12',
            'uunit13' => 'Uunit13',
            'uunit14' => 'Uunit14',
            'uunit15' => 'Uunit15',
            'uunit16' => 'Uunit16',
            'uuunit1' => 'Uuunit1',
            'uuunit2' => 'Uuunit2',
            'uuunit3' => 'Uuunit3',
            'uuunit4' => 'Uuunit4',
            'uuunit5' => 'Uuunit5',
            'uuunit6' => 'Uuunit6',
            'uuunit7' => 'Uuunit7',
            'uuunit8' => 'Uuunit8',
            'uuuunit1' => 'Uuuunit1',
            'uuuunit2' => 'Uuuunit2',
            'uuuunit3' => 'Uuuunit3',
            'uuuunit4' => 'Uuuunit4',
            'uuuuunit1' => 'Uuuuunit1',
            'uuuuunit2' => 'Uuuuunit2',
            'unit_winner' => 'Unit Winner',
            'score1' => 'Score1',
            'score2' => 'Score2',
            'score3' => 'Score3',
            'score4' => 'Score4',
            'score5' => 'Score5',
            'score6' => 'Score6',
            'score7' => 'Score7',
            'score8' => 'Score8',
            'score9' => 'Score9',
            'score10' => 'Score10',
            'score11' => 'Score11',
            'score12' => 'Score12',
            'score13' => 'Score13',
            'score14' => 'Score14',
            'score15' => 'Score15',
            'score16' => 'Score16',
            'score17' => 'Score17',
            'score18' => 'Score18',
            'score19' => 'Score19',
            'score20' => 'Score20',
            'score21' => 'Score21',
            'score22' => 'Score22',
            'score23' => 'Score23',
            'score24' => 'Score24',
            'score25' => 'Score25',
            'score26' => 'Score26',
            'score27' => 'Score27',
            'score28' => 'Score28',
            'score29' => 'Score29',
            'score30' => 'Score30',
            'score31' => 'Score31',
            'score32' => 'Score32',
            'sscore1' => 'Sscore1',
            'sscore2' => 'Sscore2',
            'sscore3' => 'Sscore3',
            'sscore4' => 'Sscore4',
            'sscore5' => 'Sscore5',
            'sscore6' => 'Sscore6',
            'sscore7' => 'Sscore7',
            'sscore8' => 'Sscore8',
            'sscore9' => 'Sscore9',
            'sscore10' => 'Sscore10',
            'sscore11' => 'Sscore11',
            'sscore12' => 'Sscore12',
            'sscore13' => 'Sscore13',
            'sscore14' => 'Sscore14',
            'sscore15' => 'Sscore15',
            'sscore16' => 'Sscore16',
            'ssscore1' => 'Ssscore1',
            'ssscore2' => 'Ssscore2',
            'ssscore3' => 'Ssscore3',
            'ssscore4' => 'Ssscore4',
            'ssscore5' => 'Ssscore5',
            'ssscore6' => 'Ssscore6',
            'ssscore7' => 'Ssscore7',
            'ssscore8' => 'Ssscore8',
            'sssscore1' => 'Sssscore1',
            'sssscore2' => 'Sssscore2',
            'sssscore3' => 'Sssscore3',
            'sssscore4' => 'Sssscore4',
            'ssssscore1' => 'Ssssscore1',
            'ssssscore2' => 'Ssssscore2',
            'time1' => 'Time1',
            'time2' => 'Time2',
            'time3' => 'Time3',
            'time4' => 'Time4',
            'time5' => 'Time5',
            'time6' => 'Time6',
            'time7' => 'Time7',
            'time8' => 'Time8',
            'time9' => 'Time9',
            'time10' => 'Time10',
            'time11' => 'Time11',
            'time12' => 'Time12',
            'time13' => 'Time13',
            'time14' => 'Time14',
            'time15' => 'Time15',
            'time16' => 'Time16',
            'ttime1' => 'Ttime1',
            'ttime2' => 'Ttime2',
            'ttime3' => 'Ttime3',
            'ttime4' => 'Ttime4',
            'ttime5' => 'Ttime5',
            'ttime6' => 'Ttime6',
            'ttime7' => 'Ttime7',
            'ttime8' => 'Ttime8',
            'tttime1' => 'Tttime1',
            'tttime2' => 'Tttime2',
            'tttime3' => 'Tttime3',
            'tttime4' => 'Tttime4',
            'ttttime1' => 'Ttttime1',
            'ttttime2' => 'Ttttime2',
            'time_final' => 'Time Final',
            'unit3place1' => 'Unit3place1',
            'unit3place2' => 'Unit3place2',
            'unit3place3' => 'Unit3place3',
            'score3place1' => 'Score3place1',
            'score3place2' => 'Score3place2',
            'time3place' => 'Time3place',
        ];
    }
}
