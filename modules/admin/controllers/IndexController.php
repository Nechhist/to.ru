<?php

namespace app\modules\admin\controllers;
use Yii;

class IndexController extends AdminBaseController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}
