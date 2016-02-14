<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $time
 * @property integer $admin_id
 * @property string $text
 * @property string $text_full
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'time', 'admin_id'], 'integer'],
            [['text', 'text_full'], 'required'],
            [['text'], 'string', 'max' => 300],
            [['text_full'], 'string', 'max' => 1500]
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
            'text_full' => 'Text Full',
        ];
    }
}
