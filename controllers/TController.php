<?php

namespace app\controllers;

use Yii;
use app\models\T;
use app\models\Season;
//use app\models\User;
use app\models\Msgs;
use yii\helpers\Html;


class TController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $ts = T::find()->orderBy('id DESC')->limit(30)->all();
        return $this->render('index', ['ts'=>$ts]);
    }

    public function actionUpdate($id=null)
    {
        $t = T::findOne($id);

        if($t!=null AND $t['admin_id']==Yii::$app->user->id){
            if($t->load(Yii::$app->request->post())){
                $t->update();
                return $this->render('view', [
                    't'=>$t,
                    'seasons'=>Season::find()->where(['t_id'=>$id])->all(),
                    'msgs'=>Msgs::find()->where(['unit_type'=>1, 'unit_id'=>$t['id']])->orderBy('id DESC')->limit(50)->all(),
                ]);
            }
            return $this->render('update', ['t'=>$t, 'seasons'=>Season::find()->where(['t_id'=>$id])->all()]);
        }else echo 'Ошибка';
    }

    public function actionUpdateseason($id=null)
    {
        $season = Season::findOne($id);

        if($season!=null AND $season['t_id']!=null){
            $t = T::findOne($season['t_id']);
            if($t['admin_id']==Yii::$app->user->id){

                if($season->load(Yii::$app->request->post())){
                    $season->time_update = time();
                    if(trim($season->name)==null) $season->name = 'Season X';
                    if($season->update()){
                        return $this->render('view', [
                            't'=>$t,
                            'seasons'=>Season::find()->where(['t_id'=>$t['id']])->all(),
                            'msgs'=>Msgs::find()->where(['unit_type'=>1, 'unit_id'=>$t['id']])->orderBy('id DESC')->limit(50)->all(),
                        ]);
                    }echo 'Ошибка сохранения!!!';
                }
                return $this->render('updateseason', ['season'=>$season, 't'=>$t]);

            }else echo 'Ошибка! Вы не админ тунира...';
        }else echo 'Ошибка';
    }

    public function actionCreateseason($id=null)
    {
        if($id!=null){
            $t = T::findOne(['id'=>$id]);
                if($t!=null AND $t['admin_id']==Yii::$app->user->id){

                    $season = new Season();
                    if($season->load(Yii::$app->request->post())){
                        $season->time_update = time();
                        $season->time = time();
                        $season->t_id = $id;
                        if(trim($season->name)==null) $season->name = 'Season 1';
                        $season->admin_id = Yii::$app->user->id;
                        if($season->save()){
                            return $this->render('view', [
                            't'=>$t,
                            'seasons'=>Season::find()->where(['t_id'=>$id])->all(),
                            'msgs'=>Msgs::find()->where(['unit_type'=>1, 'unit_id'=>$t['id']])->orderBy('id DESC')->limit(50)->all(),
                            ]);
                        }else echo 'Ошибка сохранения!!!';
                    }
                    return $this->render('createseason', ['season'=>$season, 't'=>$t]);
                }else echo 'Ошибка! Не найден турнир или Вы не админ тунира...';
        }else echo 'Ошибка! Не получены данные...';
    }


    public function actionView($id=null)
    {
        $t = T::findOne($id);
        if($t!=null){
            $seasons = Season::find()->where(['t_id'=>$id, 'invisible'=>0])->all();
            $msgs = Msgs::find()->where(['unit_type'=>1 ,'unit_id'=>$id])->orderBy('id DESC')->limit(50)->all();

            $this->CountVisitors($id);

            return $this->render('view', [
                't'=>$t,
                'msgs'=>$msgs,
                'seasons'=>$seasons,
            ]);
        }else{
            echo 'Турнир ID '.$id.' не найден!';
        }
    }


    public function actionSeason($id=null)
    {
        if($id!=null){
            $season = Season::findOne($id);
            $t = T::findOne($season['t_id']);
            if($season!=null or $t!=null) return $this->render('season', ['season'=>$season, 't'=>$t]);
            else 'Сезон ID '.$id.' не найден!';
        }else{
            echo 'Сезон ID неверен!';
        }
    }


    public function actionDeleteseason($id=null){
        //echo $id;
        if($id!=null){
            $season = Season::findOne($id);
            if($season!=null){
                $t= T::findOne($season->t_id);
                if($t!=null AND $t->admin_id==Yii::$app->user->id){
                    if($season->delete()) echo HTML::encode($season->name).'" удален';
                }else echo 'Ошибка! Не найден турнир или Вы не админ!';
            }else echo 'Ошибка! Не найден сезон.';
        }else echo 'Ошибка! id пустой.';
    }


    public function actionAjaxupdatecell($id=null){
        //echo $id;
        if($id!=null){
            $season = Season::findOne($id);
            if($season!=null){
                $t= T::findOne($season->t_id);
                if($t!=null AND $t->admin_id==Yii::$app->user->id){
                    if(isset($_GET['cell']) AND isset($_GET['msg'])){
                        $cell = $_GET['cell'];
                        $msg = $_GET['msg'];
                        $season[$cell] = $msg;
                        $season['time_update'] = time();
                        if($season->update()) echo HTML::encode($msg); else echo 'Ошибка! Не сохранилось...';
                    }else echo 'Ошибка! Не пришли жанные ячейки и записи...'.$_GET['cell'].' '.$_GET['msg'];
                }else echo 'Ошибка! Вы не админ...';
            }else echo 'Ошибка! Сезон не найден...';
        }else echo 'Ошибка! Не пришел id...';
    }


    public function actionAjaxsearcht(){
        if(isset($_GET['text'])){
            $ts = T::find()->where(['like','name', $_GET['text']])->all();
            if($ts!=null){
                foreach($ts as $one){
                    echo '<a href="'.Yii::$app->urlManager->createUrl(['t/view']).'/'.$one['id'].'">'.$one['name'].'</a> (ID#'.$one['id'].')<br />';
                }
            }else echo 'не найдено...';
        }else echo 'не получены данные...';
    }


    public function actionCreate(){

        if(!Yii::$app->user->isGuest){
            $ts = T::find()->where(['admin_id'=>Yii::$app->user->id])->all();
            $model = new T();
            if($model->load(Yii::$app->request->post())){
                $tlast = array_pop($ts);
                if($tlast['time'] > time()-60*60*12){
                    echo '
                    Вы пытаетесь создать еще один турнир, но Вы недавно (в '.date('H.i', $tlast['time']).') уже создали турнир '.HTML::encode($tlast['name']).'.
                    Ждите 12 часов с момента последнего создания турнира, чтоб создать новый турнир,
                    или используйте прошлый турнир (например измените его имя).';
                }else{
                    $model->time = time();
                    if(trim($model->name)==null) $model->name = 'Tournament X';
                    if(trim($model->opisanie)==null) $model->opisanie = 'Не хочу ничего описывать...';
                    $model->admin_id = Yii::$app->user->id;
                    if($model->save()){
                        return $this->render('view', [
                            't'=>$model,
                            'seasons'=>Season::find()->where(['t_id'=>$model['id']])->all(),
                            'msgs'=>Msgs::find()->where(['unit_type'=>1, 'unit_id'=>$model['id']])->orderBy('id DESC')->limit(50)->all(),
                        ]);
                    }else echo 'Ошибка сохранения!!!';
                }
            }
            return $this->render('create', ['model'=>$model,'ts'=>$ts]);
        }else echo 'Ошибка! Вы гость! Гости не могут создавать турниры.';
    }

    public function CountVisitors($id) {
        //redis
        if ($redis = Yii::$app->redis AND $redis->getIsActive() ) {
            $redis->incr('visitors:idt:'.$id);

            if($redis->hexists('uniques:idt:'.$id, $_SERVER["REMOTE_ADDR"])==true){
                $count_unique = $redis->hget('uniques:idt:'.$id, $_SERVER["REMOTE_ADDR"]);
                $redis->hmset('uniques:idt:'.$id, $_SERVER["REMOTE_ADDR"], $count_unique+1);
            }
            else $redis->hmset('uniques:idt:'.$id, $_SERVER["REMOTE_ADDR"], '1');
        }
    }
}
