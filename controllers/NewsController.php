<?php

namespace app\controllers;

use Yii;
use app\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class NewsController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest AND Yii::$app->user->id < 6){
            $dataProvider = new ActiveDataProvider([
                'query' => News::find(),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }else echo 'Ошибка! Доступ закрыт...';
    }


    public function actionView($id)
    {
        if(!Yii::$app->user->isGuest AND Yii::$app->user->id < 6){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else echo 'Ошибка! Доступ закрыт...';
    }


    public function actionCreate()
    {
        if(!Yii::$app->user->isGuest AND Yii::$app->user->id < 6){
            $model = new News();

            if ($model->load(Yii::$app->request->post())){
                $model->time = time();
                if(!Yii::$app->user->isGuest) $model->admin_id = Yii::$app->user->id; else $model->admin_id = 0;
                if($model->text_full==null) $model->text_full = $model->text;
                if($model->save()) return $this->redirect(['view', 'id' => $model->id]);
                else{
                    echo '<pre>';
                    print_r($model);
                    echo '</pre>';
                }

            }else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }else echo 'Ошибка! Доступ закрыт...';
    }


    public function actionUpdate($id)
    {
        if(!Yii::$app->user->isGuest AND Yii::$app->user->id < 6){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }else echo 'Ошибка! Доступ закрыт...';
    }


    public function actionDelete($id)
    {
        if(!Yii::$app->user->isGuest AND Yii::$app->user->id < 6){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
        }else echo 'Ошибка! Доступ закрыт...';
    }


    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена.');
        }
    }

}
