<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

class AdminBaseController extends Controller
{
    public function init(){

        if (Yii::$app->user->isGuest || Yii::$app->user->id >= 5) {
            die("Доступ закрыт! Вы не являетесь админом.");
        }

        parent::init();
    }
}
