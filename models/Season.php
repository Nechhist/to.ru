<?php

namespace app\models;

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
            //[['t_id', 'time', 'admin_id', 'time_update', 'time_action', 'net_type', 'unit1', 'unit2', 'unit3', 'unit4', 'unit5', 'unit6', 'unit7', 'unit8', 'unit9', 'unit10', 'unit11', 'unit12', 'unit13', 'unit14', 'unit15', 'unit16', 'unit17', 'unit18', 'unit19', 'unit20', 'unit21', 'unit22', 'unit23', 'unit24', 'unit25', 'unit26', 'unit27', 'unit28', 'unit29', 'unit30', 'unit31', 'unit32', 'uunit1', 'uunit2', 'uunit3', 'uunit4', 'uunit5', 'uunit6', 'uunit7', 'uunit8', 'uunit9', 'uunit10', 'uunit11', 'uunit12', 'uunit13', 'uunit14', 'uunit15', 'uunit16', 'uuunit1', 'uuunit2', 'uuunit3', 'uuunit4', 'uuunit5', 'uuunit6', 'uuunit7', 'uuunit8', 'uuuunit1', 'uuuunit2', 'uuuunit3', 'uuuunit4', 'uuuuunit1', 'uuuuunit2', 'unit_winner', 'score1', 'score2', 'score3', 'score4', 'score5', 'score6', 'score7', 'score8', 'score9', 'score10', 'score11', 'score12', 'score13', 'score14', 'score15', 'score16', 'score17', 'score18', 'score19', 'score20', 'score21', 'score22', 'score23', 'score24', 'score25', 'score26', 'score27', 'score28', 'score29', 'score30', 'score31', 'score32', 'sscore1', 'sscore2', 'sscore3', 'sscore4', 'sscore5', 'sscore6', 'sscore7', 'sscore8', 'sscore9', 'sscore10', 'sscore11', 'sscore12', 'sscore13', 'sscore14', 'sscore15', 'sscore16', 'ssscore1', 'ssscore2', 'ssscore3', 'ssscore4', 'ssscore5', 'ssscore6', 'ssscore7', 'ssscore8', 'sssscore1', 'sssscore2', 'sssscore3', 'sssscore4', 'ssssscore1', 'ssssscore2', 'time1', 'time2', 'time3', 'time4', 'time5', 'time6', 'time7', 'time8', 'time9', 'time10', 'time11', 'time12', 'time13', 'time14', 'time15', 'time16', 'ttime1', 'ttime2', 'ttime3', 'ttime4', 'ttime5', 'ttime6', 'ttime7', 'ttime8', 'tttime1', 'tttime2', 'tttime3', 'tttime4', 'ttttime1', 'ttttime2', 'time_final'], 'required'],
            [['t_id', 'type', 'time', 'admin_id', 'time_update', 'unit_type', 'score_open', 'invisible', 'zayavka_open', 'net_type', 'label'], 'integer'],
            [['name'], 'string', 'max' => 16],
            [['time_action'], 'string', 'max' => 20],
            [['unit3place1', 'unit3place2', 'unit3place3', 'unit1', 'unit2', 'unit3', 'unit4', 'unit5', 'unit6', 'unit7', 'unit8', 'unit9', 'unit10', 'unit11', 'unit12', 'unit13', 'unit14', 'unit15', 'unit16', 'unit17', 'unit18', 'unit19', 'unit20', 'unit21', 'unit22', 'unit23', 'unit24', 'unit25', 'unit26', 'unit27', 'unit28', 'unit29', 'unit30', 'unit31', 'unit32', 'uunit1', 'uunit2', 'uunit3', 'uunit4', 'uunit5', 'uunit6', 'uunit7', 'uunit8', 'uunit9', 'uunit10', 'uunit11', 'uunit12', 'uunit13', 'uunit14', 'uunit15', 'uunit16', 'uuunit1', 'uuunit2', 'uuunit3', 'uuunit4', 'uuunit5', 'uuunit6', 'uuunit7', 'uuunit8', 'uuuunit1', 'uuuunit2', 'uuuunit3', 'uuuunit4', 'uuuuunit1', 'uuuuunit2', 'unit_winner'], 'string', 'max' => 12],
            [['score3place1', 'score3place2', 'score1', 'score2', 'score3', 'score4', 'score5', 'score6', 'score7', 'score8', 'score9', 'score10', 'score11', 'score12', 'score13', 'score14', 'score15', 'score16', 'score17', 'score18', 'score19', 'score20', 'score21', 'score22', 'score23', 'score24', 'score25', 'score26', 'score27', 'score28', 'score29', 'score30', 'score31', 'score32', 'sscore1', 'sscore2', 'sscore3', 'sscore4', 'sscore5', 'sscore6', 'sscore7', 'sscore8', 'sscore9', 'sscore10', 'sscore11', 'sscore12', 'sscore13', 'sscore14', 'sscore15', 'sscore16', 'ssscore1', 'ssscore2', 'ssscore3', 'ssscore4', 'ssscore5', 'ssscore6', 'ssscore7', 'ssscore8', 'sssscore1', 'sssscore2', 'sssscore3', 'sssscore4', 'ssssscore1', 'ssssscore2'], 'string', 'max' => 3],
            [['time3place', 'time1', 'time2', 'time3', 'time4', 'time5', 'time6', 'time7', 'time8', 'time9', 'time10', 'time11', 'time12', 'time13', 'time14', 'time15', 'time16', 'ttime1', 'ttime2', 'ttime3', 'ttime4', 'ttime5', 'ttime6', 'ttime7', 'ttime8', 'tttime1', 'tttime2', 'tttime3', 'tttime4', 'ttttime1', 'ttttime2', 'time_final'], 'string', 'max' => 16]
        ];
    }

    public static function nets($i=0, $id=0){
        $nets = [
            // Первая цифра: 1-дерево, 2-группы, 3-круговая.

            ///////////// ДЕРЕВО
            // Вторая цифра: 0-нет_третьего_места, 1-третье_место.
            // Третья цифра: 0-нет_лузера, 1-есть_лузера.
            // Четвертая цифра: кол-во юнитов.
            // Пятая цифра: кол-во юнитов.

            '10004' => ['id'=>10004, 'name'=>'Дерево-4', 'opisanie'=>'Дерево с 4 участниками, без 3 места, без лузеров', 'count'=>'4', 'type'=>'1', '3place'=>'0', 'luser'=>'0', 'example'=>1],
            '11004' => ['id'=>11004, 'name'=>'Дерево-4т', 'opisanie'=>'Дерево с 4 участниками, с 3 местом, без лузеров', 'count'=>'4', 'type'=>'1', '3place'=>'1', 'luser'=>'0', 'example'=>2],
            '11104' => ['id'=>11104, 'name'=>'Дерево-4тл', 'opisanie'=>'Дерево с 4 участниками, с 3 местом, с лузерами', 'count'=>'4', 'type'=>'1', '3place'=>'1', 'luser'=>'1', 'example'=>15],

            '10008' => ['id'=>10008, 'name'=>'Дерево-8', 'opisanie'=>'Дерево с 8 участниками, без 3 места, без лузеров', 'type'=>'1', 'count'=>'8', '3place'=>'0', 'luser'=>'0', 'example'=>3],
            '11008' => ['id'=>11008, 'name'=>'Дерево-8т', 'opisanie'=>'Дерево с 8 участниками, с 3 местом, без лузеров', 'type'=>'1', 'count'=>'8', '3place'=>'1', 'luser'=>'0', 'example'=>4],
            '11108' => ['id'=>11108, 'name'=>'Дерево-8тл', 'opisanie'=>'Дерево с 8 участниками, с 3 местом, с лузерами', 'type'=>'1', 'count'=>'8', '3place'=>'1', 'luser'=>'1', 'example'=>16],

            '10016' => ['id'=>10016, 'name'=>'Дерево-16', 'opisanie'=>'Дерево с 16 участниками, без 3 места, без лузеров', 'type'=>'1', 'count'=>'16', '3place'=>'0', 'luser'=>'0', 'example'=>5],
            '11016' => ['id'=>11016, 'name'=>'Дерево-16т', 'opisanie'=>'Дерево с 16 участниками, с 3 местом, без лузеров', 'type'=>'1', 'count'=>'16', '3place'=>'1', 'luser'=>'0', 'example'=>6],
            '11116' => ['id'=>11116, 'name'=>'Дерево-16тл', 'opisanie'=>'Дерево с 16 участниками, с 3 местом, с лузерами', 'type'=>'1', 'count'=>'16', '3place'=>'1', 'luser'=>'1', 'example'=>17],

            '10032' => ['id'=>10032, 'name'=>'Дерево-32', 'opisanie'=>'Дерево с 32 участниками, без 3 места, без лузеров', 'type'=>'1', '3place'=>'0', 'count'=>'32', 'luser'=>'0', 'example'=>7],
            '11032' => ['id'=>11032, 'name'=>'Дерево-32т', 'opisanie'=>'Дерево с 32 участниками, с 3 местом, без лузеров', 'type'=>'1', '3place'=>'1', 'count'=>'32', 'luser'=>'0', 'example'=>8],
            //'11132' => ['id'=>10032, 'name'=>'Дерево-32тл', 'opisanie'=>'Дерево с 32 участниками, с 3 местом, с лузерами', 'type'=>'1', '3place'=>'1', 'count'=>'32', 'luser'=>'1', 'example'=>1],

            '24016' => ['id'=>24016, 'name'=>'Группы-16(4х4)', 'opisanie'=>'Группы с 16 участниками (4 группы по 4 участника)', 'type'=>'2', '3place'=>'0', 'count'=>'16', 'luser'=>'0', 'example'=>1],
            '22008' => ['id'=>22008, 'name'=>'Группы-8(2х4)', 'opisanie'=>'Группы с 8 участниками (2 группы по 4 участника)', 'type'=>'2', '3place'=>'0', 'count'=>'8', 'luser'=>'0', 'example'=>1],
        ];

        if($i==0) return $nets;

        ///////////////// для одиночной выборки
        if($i==1 AND isset($nets[$id])) return $nets[$id]['name'];

        ///////////////// для ниспадающего списка /////////////////
        if($i==2){
            $result = [];
            foreach($nets as $one){
                $result[$one['id']] = $one['opisanie'];
            }
            return $result;
        }

        ///////////////// для кол-во участников
        if($i==3 AND isset($nets[$id])) return $nets[$id]['count'];
    }














    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            't_id' => 'T ID',
            'type' => 'Тип',
            'time' => 'Время создания',
            'admin_id' => 'Admin ID',
            'time_update' => 'Время посл.изменения',
            'name' => 'Название сезона',
            'unit_type' => '(отключено) Тип участников',
            'time_action' => 'Время проведения',
            'score_open' => 'Показ побед/очков',
            'invisible' => 'Режим показа',
            'zayavka_open' => '(отключено) Прием заявок',
            'net_type' => 'Тип турнирной сетки',
            'label' => '(отключено) Название столбцов',
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
        ];
    }
}
