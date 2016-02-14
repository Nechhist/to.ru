<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $time
 * @property integer $admin_id
 * @property string $text
 * @property string $answer
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'time', 'admin_id', 'text'], 'required'],
            [['type', 'time', 'admin_id'], 'integer'],
            [['text', 'answer'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип сообщения',
            'time' => 'Время',
            'admin_id' => 'Admin ID',
            'text' => 'Текст сообщения',
            'answer' => 'Ответ',
        ];
    }
}
