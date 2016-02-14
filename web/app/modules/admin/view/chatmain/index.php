<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ChatmainSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chatmains';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chatmain-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Chatmain', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'time:datetime',
            'admin_id',
            'text',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
