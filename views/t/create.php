<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Создание турнира | '.Yii::$app->name;
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Турнир онлайн, создание турнирных сеток']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Создание турнира']);
?>
<div class="container">
<div class=" row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xm-12">
        <h2>Создать новый турнир</h2>
        <div class="red">Все поля не обязательны.</div>
        <?php $form = ActiveForm::begin();?>

        <?=$this->render('_form.php' , ['form' => $form, 'model' => $model]) ?>

        <p>
            <?= Html::submitButton('Создать новый турнир', ['class' => 'button_creat_tournament']) ?>
            <br />
            <span class="grey">(все параметры турнира Вы можете многократно изменять после создания турнира)</span>
        </p>
        <?php ActiveForm::end(); ?>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-3 col-xm-12">
        <h3>Мои турниры</h3>
        <?php if($ts!=null){ ?>
            <?php foreach($ts as $one){ ?>
                (ID <?php echo $one['id']; ?>)
                <?=Html::a(HTML::encode($one['name']), '/' . $one['id'])?>
                <br />
            <?php } ?>
        <?php }else{ ?>
            <span class="grey">Турниры не найдены...</span>
        <?php } ?>
    </div>
</div>
</div>