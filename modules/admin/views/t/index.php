<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="t-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create T', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'admin_id',
            'type',
            'time:datetime',
            'name',
            // 'game',
            // 'img',
            // 'site',
            // 'opisanie',
            // 'color_table',
            // 'color_text_unit',
            // 'color_text_time',
            // 'color_line',
            // 'color_cell',
            // 'invisible',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
