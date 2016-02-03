<?php

namespace app\controllers;

use Yii;
use app\models\Link;
use app\models\T;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LinkController implements the CRUD actions for Link model.
 */
class LinkController extends Controller
{

    public function actionIndex()
    {
        $my_link = [];
        $my_t = [];

        if(!Yii::$app->user->isGuest){
            $my_t = T::find()->where(['admin_id'=>Yii::$app->user->id])->all();
            $my_link = Link::find()->where(['admin_id'=>Yii::$app->user->id])->all();
        }
        return $this->render('index',[
            'my_t'=>$my_t,
            'my_link'=>$my_link,
        ]);
    }

    public function actionAjaxaddlinkt($id){
        $count = Link::find()->where(['admin_id'=>Yii::$app->user->id])->andWhere(['link_type'=>1])->andWhere(['link_id'=>$id])->count();
        if($count==0){
            $link = new Link;
            $link->link_type = 1;
            $link->link_id = $id;
            $link->admin_id = Yii::$app->user->id;
            $link->time = time();
            if($link->save()) echo 'турнир добавлен';
            else echo 'не сохранилось...';
        }else echo 'уже был добавлен...';
    }


    function actionAjaxdelete($id=null){
        $link = Link::findOne($id);
        if($link!=null AND $link['admin_id']==Yii::$app->user->id){
            if($link->delete()) echo '...';
        }else echo 'нет данных...';
    }


    /**
     * Finds the Link model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Link the loaded model
     * @throws NotFoundHttpException if the model cannot be found

    protected function findModel($id)
    {
        if (($model = Link::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     * */
}
