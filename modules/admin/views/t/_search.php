<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="t-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'admin_id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'game') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'site') ?>

    <?php // echo $form->field($model, 'opisanie') ?>

    <?php // echo $form->field($model, 'color_table') ?>

    <?php // echo $form->field($model, 'color_text_unit') ?>

    <?php // echo $form->field($model, 'color_text_time') ?>

    <?php // echo $form->field($model, 'color_line') ?>

    <?php // echo $form->field($model, 'color_cell') ?>

    <?php // echo $form->field($model, 'invisible') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
