<?php

namespace app\controllers;

use Yii;
use app\models\T;
use app\models\Season;
//use app\models\User;
use app\models\Msgs;
use yii\base\Exception;
use yii\helpers\Html;
use yii\web\HttpException;


class TController extends \yii\web\Controller
{

    //////////////// T O U R N A M E N T //////////////////////////////////

    public function actionIndex()
    {
        $ts = T::find(['invisible' => 0])->orderBy('id DESC')->limit(50)->all();
        return $this->render('index', ['ts'=>$ts]);
    }

    public function actionUpdate($id = null)
    {
        $t = T::findOne($id);

        if ($t != null && $t['admin_id'] == Yii::$app->user->id) {

            if ($t->load(Yii::$app->request->post())) {
                $t->update();
                return $this->render('view', [
                    't' => $t,
                    'seasons' => Season::find()->where(['t_id' => $id])->all(),
                    'msgs' => Msgs::find(['unit_type'=>1 ,'unit_id'=>$id])->orderBy('id DESC')->limit(50)->all(),
                ]);
            }
            return $this->render('update', [
                't' => $t,
                'seasons' => Season::find()->where(['t_id' => $id])->all(),
                'visitors' => $this->getCountVisitors($id)
            ]);
        } else throw new HttpException(404, "Не правильный id. Или Вы не админ");
    }




    public function actionView($id=null)
    {
        $t = T::findOne($id);
        if($t!=null){
            $seasons = Season::find()->where(['t_id'=>$id, 'invisible'=>0])->all();
            $msgs = Msgs::find()->where(['unit_type'=>1 ,'unit_id'=>$id])->orderBy('id DESC')->limit(50)->all();

            $this->setCountVisitors($id);

            return $this->render('view', [
                't'=>$t,
                'msgs'=>$msgs,
                'seasons'=>$seasons,
            ]);
        }else{
            echo 'Турнир ID '.$id.' не найден!';
        }
    }

    public function actionCreate(){

        if(!Yii::$app->user->isGuest){
            // турниры пользователя
            $ts = T::find()->where(['admin_id'=>Yii::$app->user->id])->orderBy('id DESC')->all();

            $model = new T();
            if($model->load(Yii::$app->request->post())){
                if(isset($ts[0]) && $ts[0]['time'] > time()-60*60*3){
                    echo '
                    <h2 style="color: red; text-align: center">
                    Вы недавно (в '.date('H.i', $ts[0]['time']).' мск.) уже создали турнир '.HTML::encode($ts[0]['name']).'.
                    <br />Извините, у нас ограничение на создание: один турнир в 3 часа.
                    </h2>
                    ';
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
        }else $this->redirect(Yii::$app->request->baseUrl . '/site/login'); //echo 'Ошибка! Вы гость! Гости не могут создавать турниры.';
    }


    //////////////////////  S E A S O N  //////////////////////

    public function actionUpdateseason($id=null)
    {
        $season = Season::findOne($id);

        if ($season != null AND $season['t_id'] != null) {
            $t = T::findOne($season['t_id']);
            if ($t['admin_id'] == Yii::$app->user->id){

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
                    if($season->delete()) echo '"' . HTML::encode($season->name).'" удалено';
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


    public function actionAjaxsearch(){
        if(isset($_GET['text']) AND $_GET['text'] != null){
            if(strlen($_GET['text']) > 3) {
                $ts = T::find()->where(['like','name', $_GET['text']])->limit(200)->orderBy('id DESC')->all();
                echo $this->renderAjax('_resultSearch.php', ['ts' => $ts]);
            }else echo 'Строка запроса не может быть меньше 4 символов';
        }else echo 'Пустой запрос...';
    }



    public function actionAllnets(){
        return $this->render('allnets');
    }


    //////////////// R E D I S //////////////////////////////////////////////////////////
    // visitors_all:id:1 - всего всех посетителей
    // visitors_uni:id:1 - всего уникальных посетителей
    // uniques:id:1:ip:192.168.1.1 - посетитель с ip 192.168.1.1 на турнире с id 1

    /**
     * создать нового визитера
     * @param $id - id турнира
     */
    public function setCountVisitors($id) {

        // если редис инициирован и соединение установлено
        $redis = Yii::$app->redis;
        if($redis) {
            // инкримент всех пользователей
            $redis->incr('visitors_all:id:'.$id);

            // проверка на наличие унакалього пользователя
            if($redis->exists('uniques:id:' . $id . ':ip:' . $_SERVER["REMOTE_ADDR"]) != true){
                // создаем уникального пользователя
                $redis->set('uniques:id:' . $id . ':ip:' . $_SERVER["REMOTE_ADDR"], 1);
                // инкримент уникальных пользователей
                $redis->incr('visitors_uni:id:'.$id);
            }
        }
    }

    public function getCountVisitors($id) {

        $visitors = [];
        $redis = Yii::$app->redis;
        // если редис инициирован и соединение установлено
        if ($redis) {
            // берем визиторов
            $visitors['all'] = $redis->get('visitors_all:id:' . $id);
            $visitors['uni'] = $redis->get('visitors_uni:id:' . $id);
        }
        return $visitors;
    }
    //////////////// конец редис ////////////////////////////////////////////////////////
}
