<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "chatmain".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $time
 * @property integer $admin_id
 * @property string $text
 */
class Chatmain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chatmain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'time', 'admin_id'], 'integer'],
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
            'type' => 'Type',
            'time' => 'Time',
            'admin_id' => 'Admin ID',
            'text' => 'Text',
        ];
    }
}
