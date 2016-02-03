<?php

namespace app\controllers;
use Yii;
use app\models\Msgs;
use app\models\User;
use yii\helpers\Html;

use yii\BaseYii;
use yii\web\UploadedFile;
use app\models\Upload;


class NechhController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpload()
    {
        $dir = Yii::getAlias('@app/web/uploads');
        $uploaded = false;

        $model = new Upload();

        if($model->load($_POST)) {

            $file = UploadedFile::getInstance($model,'file');
            var_dump($_POST);
            if($model->validate()) {
                $uploaded = $file->saveAs($dir . '/' .'test.jpg');
            }
        }

        return $this->render('upload',[
            'model' => $model,
            'uploaded' => $uploaded,
            'dir' => $dir,
        ]);
    }
}