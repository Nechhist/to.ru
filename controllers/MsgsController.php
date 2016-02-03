<?php

namespace app\controllers;
use Yii;
use app\models\Msgs;
use app\models\User;
use yii\helpers\Html;

class MsgsController extends \yii\web\Controller
{
    public function actionAjaxentermsg($id=null)
    {
        if(isset($_GET['text'])) {
            if(!Yii::$app->user->isGuest){
                $model = new Msgs();
                $model->admin_id = Yii::$app->user->id;
                $model->text = $_GET['text'];
                $model->time = time();
                $model->unit_type=1;
                $model->unit_id=$id;
                if($model->save()){
                    echo
                    '<tr>
                        <th>'.
                            User::name(Yii::$app->user->id).'<br/>
                            <span style="font-size: xx-small; color: #c0c0c0;">('.date('d.m.y', time()).')</span>
                        </th>
                        <td>'.nl2br(HTML::encode($_GET['text'])).'</td>
                    </tr>';
                }else echo '== данные не сохранились... ==';
            }else echo
                '<tr class="grey">
                        <th>
                            Гость<br/>
                            <span style="font-size: xx-small;">('.date('d.m.y', time()).')</span>
                        </th>
                        <td>'.nl2br(HTML::encode($_GET['text'])).'</td>
                </tr>';
        }else echo '== данные не получены... ==';
    }

}
