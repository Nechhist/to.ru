<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "link".
 *
 * @property integer $id
 * @property integer $link_type
 * @property integer $link_id
 * @property integer $time
 * @property integer $admin_id
 * @property integer $param
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link_type', 'link_id', 'time', 'admin_id', 'param'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link_type' => 'Link Type',
            'link_id' => 'Link ID',
            'time' => 'Time',
            'admin_id' => 'Admin ID',
            'param' => 'Param',
        ];
    }
}
