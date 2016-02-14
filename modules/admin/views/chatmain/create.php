<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Chatmain */

$this->title = 'Create Chatmain';
$this->params['breadcrumbs'][] = ['label' => 'Chatmains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chatmain-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
