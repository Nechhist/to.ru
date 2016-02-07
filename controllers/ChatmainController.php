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
        if(isset($_GET['text']) && $_GET['text'] != NULL) {
            $_GET['text'] = substr($_GET['text'], 0, 254);
            if(!Yii::$app->user->isGuest){
                // проверка на спам.
                $check = Chatmain::findOne(['admin_id' => Yii::$app->user->id]);
                if($check && $check['time'] < time() - 10){
                    // создание новой записи
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
                } else {
                    '<div class="grey">
                        <span>.User::name(Yii::$app->user->id): </span>
                        <span>'.nl2br(HTML::encode($_GET['text'])).'</span>
                        <span> (Антиспам: сообщение не будет сохранено)</span>
                    </div>';
                }
            }else echo
                '<div class="grey">
                    <span>Гость: </span>
                    <span>'.nl2br(HTML::encode($_GET['text'])).'</span>
                </div>';
        } //else echo '== данные не получены... ==';
    }

}

