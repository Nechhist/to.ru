<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\T */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="t-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'admin_id')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'game')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opisanie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color_table')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color_text_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color_text_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color_line')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color_cell')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invisible')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
