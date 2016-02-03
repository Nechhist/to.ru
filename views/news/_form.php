<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList(['1'=>'видна всем', '2'=>'видна только админам']) ?>

    <?= $form->field($model, 'text')->textarea(['maxlength' => 300, 'rows' => '5', 'cols' => '60']) ?>

    <?= $form->field($model, 'text_full')->textarea(['maxlength' => 1500, 'rows' => '5', 'cols' => '60']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cоздать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
