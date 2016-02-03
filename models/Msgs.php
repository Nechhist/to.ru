<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "msgs".
 *
 * @property integer $id
 * @property integer $unit_type
 * @property integer $unit_id
 * @property integer $admin_id
 * @property integer $time
 * @property string $text
 * @property integer $param
 */
class Msgs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'msgs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unit_type', 'unit_id', 'admin_id', 'time', 'param'], 'integer'],
            [['text'], 'required'],
            [['text'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unit_type' => 'Unit Type',
            'unit_id' => 'Unit ID',
            'admin_id' => 'Admin ID',
            'time' => 'Time',
            'text' => 'Text',
            'param' => 'Param',
        ];
    }
}
