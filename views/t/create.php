<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Создание турнира | '.Yii::$app->name;
?>
<div class="container">
<div class=" row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xm-12">
        <h2>Создать новый турнир</h2>
        <div class="red">Все поля не обязательны.</div>
        <?php $form = ActiveForm::begin();?>

        <p>
            <?= $form->field($model, 'name')->textInput(['size'=>'20', 'maxlength'=>'20', 'placeholder'=>'Tournament X'])
            ->label($model->attributeLabels()['name'] . ' <span class="desc_field" >(максимально 20 символов. Пример: "Лига Меча и Магии", "Кубок Большого Брата")</span>'); ?>
        </p>

        <p>
            <?= $form->field($model, 'game')->textInput(['size'=>'15', 'maxlength'=>'15', 'placeholder'=>'Game of thrones'])
            ->label($model->attributeLabels()['game'] . ' <span class="desc_field" >(максимально 15 символов. Пример: "Dota2", "Шахматы")</span>') ?>
        </p>

        <p>
            <?= $form->field($model, 'site')->textInput(['size'=>'20', 'maxlength'=>'50', 'placeholder'=>'http://www.yandex.ru'])
                ->label($model->attributeLabels()['site'] . ' <span class="desc_field" >(максимально 50 символов. Пример: "http://vk.com/to_dota2")</span>') ?>
        </p>

        <p>
            <?= $form->field($model, 'opisanie')->textarea(['size'=>'20', 'rows'=>'2', 'cols'=>'60','placeholder'=>'Не хочу ничего описывать...'])
            ->label($model->attributeLabels()['opisanie'] . ' <span class="desc_field" >(максимально 500 символов)</span>') ?>
        </p>

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
                <a href="<?php echo Yii::$app->request->baseUrl; ?>/t/view/<?php echo $one['id']; ?>">
                    <?php echo HTML::encode($one['name']); ?>
                </a>
                <br />
            <?php } ?>
        <?php }else{ ?>
            <span class="grey">Турниры не найдены...</span>
        <?php } ?>
    </div>
</div>
</div>