<?php

namespace app\models;

use Yii;
use yii\helpers\Html;


/**
 * This is the model class for table "t".
 *
 * @property integer $id
 * @property integer $admin_id
 * @property integer $type
 * @property integer $time
 * @property string $name
 * @property string $game
 * @property string $img
 * @property string $site
 * @property string $opisanie
 * @property string $color_table
 * @property string $color_text_unit
 * @property string $color_text_time
 * @property string $color_line
 * @property string $color_cell
 * @property integer $invisible
 */
class T extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['admin_id', 'name',], 'required'],
            [['admin_id', 'type', 'time', 'invisible'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['game'], 'string', 'max' => 15],
            [['img', 'opisanie'], 'string', 'max' => 500],
            [['site'], 'string', 'max' => 50],
            [['color_table', 'color_text_unit', 'color_text_time', 'color_line', 'color_cell'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => 'Admin ID',
            'type' => 'Тип',
            'time' => 'Время создания',
            'name' => 'Название турнира',
            'game' => 'Игра',
            'img' => 'Ссылка на изображение для логотипа',
            'site' => 'Ссылка на сайт',
            'opisanie' => 'Описание турнира',
            'color_table' => 'Фоновый цвет таблицы',
            'color_text_unit' => 'Цвет текста "Участник"',
            'color_text_time' => 'Цвет текста "Время матча"',
            'color_line' => 'Цвет линий',
            'color_cell' => 'Фоновый цвет ячейки',
            'invisible' => 'Скрыть турнир',
        ];
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $this->img = str_replace (['http://', 'https://'], '', $this->img);
            $this->img = trim($this->img);

            $this->site = str_replace (['http://', 'https://'], '', $this->site);
            $this->site = trim($this->site);

            if (empty($this->img)) {
                $this->img = 'http://tournamentonline.pro/images/logo_t.png';
            } else {
                $this->img = 'http://' .  $this->img;
            }

            if (!empty($this->site)) {
                $this->site = 'http://' .  $this->site;
            }

            return true;
        }
        return false;
    }

    /**
     * @param $id - id турнира
     * @param int $a - включить ссылку
     * @return string
     */
    public static  function name($id, $a = 0){
        if($id==0) return '<i>Неизвестный</i>';

        $t = T::findOne(['id' => $id]);

        if($t == null) return '<i>==не_найден==</i>';
        if($a == 0) return HTML::encode($t['name']);
        if($a == 1) return '<a href="'.Yii::$app->request->baseUrl.'/'.$t['id'].'">'.HTML::encode($t['name']).'</a>';
        return '<i>==нет_параметра==</i>';
    }
}
