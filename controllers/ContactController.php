<?php

namespace app\controllers;

use Yii;
use app\models\Contact;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContactController implements the CRUD actions for Contact model.
 */
class ContactController extends Controller
{


    public function actionIndex()
    {
        $model = new Contact();
        $msgs = Contact::find()->orderBy('id DESC')->limit('50')->all();

        if ($model->load(Yii::$app->request->post())) {
            $model->admin_id = Yii::$app->user->id;
            $model->time = time();
            $model->save();
            $this->redirect('contact');
        }

        // проверка на время публикации (1 час)
        $openContactForm = true;
        $restTime = 0;
        foreach ($msgs as $one) {
            if ($one['admin_id'] == Yii::$app->user->id && $one['time'] >= (time() - 60*60)) {
                $openContactForm = false;
                $restTime = ceil(($one['time'] - (time() - 60*60)) / 60) ;
                break;
            }
        }

        return $this->render('index', [
            'model' => $model,
            'msgs' => $msgs,
            'openContactForm' => $openContactForm,
            'restTime' => $restTime
        ]);

    }

    /**
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Contact::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new Contact();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Contact::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    */
}
