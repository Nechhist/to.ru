<?php

namespace app\modules\admin;
use Yii;

class AdminModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public $defaultRoute = 'index';

    public function init()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->id > 5) {
            die("Доступ закрыт! Вы не являетесь админом.");
        }

        parent::init();
    }
}
