<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MsgsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msgs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'unit_type') ?>

    <?= $form->field($model, 'unit_id') ?>

    <?= $form->field($model, 'admin_id') ?>

    <?= $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'param') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
