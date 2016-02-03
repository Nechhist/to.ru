<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use app\models\User;
use app\models\Chatmain;


class ChatmainController extends Controller
{

    public function actionAjaxenterchatmain()
    {
        if(!Yii::$app->user->isGuest){
            if(isset($_GET['text'])) {
                //echo 111;
                $model = new Chatmain();
                $model->admin_id = Yii::$app->user->id;
                $model->text = $_GET['text'];
                $model->time = time();
                if($model->save()){
                    echo
                    '<div>
                        <span>'.User::name(Yii::$app->user->id).': </span>
                        <span>'.nl2br(HTML::encode($_GET['text'])).'</span>
                    </div>';
                }else echo '== данные не сохранились... ==';
            }else echo '== данные не получены... ==';
        }else echo
            '<div class="grey">
                <span>Гость: </span>
                <span>'.nl2br(HTML::encode($_GET['text'])).'</span>
            </div>';
    }

}

