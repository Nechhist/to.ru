<?php

namespace app\modules\admin;
use Yii;

class AdminModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public $defaultRoute = 'index';

    public function init()
    {
        parent::init();
    }
}
