<?php

namespace app\modules\admin\models;

use Yii;

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
            [['admin_id', 'time', 'name', 'game', 'img', 'site'], 'required'],
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
            'type' => 'Type',
            'time' => 'Time',
            'name' => 'Name',
            'game' => 'Game',
            'img' => 'Img',
            'site' => 'Site',
            'opisanie' => 'Opisanie',
            'color_table' => 'Color Table',
            'color_text_unit' => 'Color Text Unit',
            'color_text_time' => 'Color Text Time',
            'color_line' => 'Color Line',
            'color_cell' => 'Color Cell',
            'invisible' => 'Invisible',
        ];
    }
}
