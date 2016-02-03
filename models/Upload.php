<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Upload extends Model
{
    public $file;

    public function rules()
    {
        return [
            ['file','file','extensions'=> ['jpg']],
        ];
    }
}