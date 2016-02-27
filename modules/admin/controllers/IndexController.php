<?php

namespace app\modules\admin\controllers;
use app\modules\admin\models\Season;
use app\modules\admin\models\User;
use Yii;

class IndexController extends AdminBaseController
{

    public function actionIndex()
    {
        $seasons = Season::find()->orderBy('time_update DESC')->limit(15)->all();
        $users = User::find()->orderBy('id DESC')->limit(10)->all();

        return $this->render('index',[
            'seasons' => $seasons,
            'users' => $users,
        ]);
    }

}
