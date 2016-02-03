<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Создание турнира | '.Yii::$app->name;
?>

<table style="width: 100%">
    <tr style="vertical-align: top;">
        <td style="border: 3px solid #39b3d7; padding: 10px">
            <h2>Создать новый турнир</h2>
            <?php $form = ActiveForm::begin(); ?>

                 <p><?= $form->field($model, 'name')->textInput(['size'=>'20', 'maxlength'=>'20', 'placeholder'=>'Tournament X']) ?>
                    <span class="desc_field" >максимально 20 символов. Пример: "Лига Меча и Магии", "Кубок Большого Брата"...</span></p>
                 <p><?= $form->field($model, 'game')->textInput(['size'=>'15', 'maxlength'=>'15', 'placeholder'=>'Game of thrones']) ?>
                    <span class="desc_field" >максимально 15 символов. Пример: "Dota2", "Шахматы"...</span></p>
                 <p><?= $form->field($model, 'site')->textInput(['size'=>'20', 'maxlength'=>'50', 'placeholder'=>'http://www.yandex.ru']) ?>
                    <span class="desc_field" >максимально 50 символов. Пример: "http://vk.com/to_dota2"...</span></p>
                 <p><?= $form->field($model, 'opisanie')->textarea(['size'=>'20', 'rows'=>'2', 'cols'=>'60','placeholder'=>'Не хочу ничего описывать...'])->label('Описание турнира<br />') ?>
                    <span class="desc_field" >максимально 500 символов.</span></p>

            <p style="text-align: left">
                <?= Html::submitButton('Создать новый турнир', ['class' => 'button_create']) ?>
                <br /><span class="grey">(все параметры турнира Вы можете впоследствии многократно изменять после создания турнира)</span>
            </p>

        </td>
        <td style="width: 300px; padding: 0px 10px 0px 30px">
            <h3>Мои турниры</h3>
            <?php if($ts!=null){ ?>
            <?php foreach(array_reverse($ts) as $one){ ?>
                (ID <?php echo $one['id']; ?>) <a href="<?php echo Yii::$app->request->baseUrl; ?>/t/view/<?php echo $one['id']; ?>"><?php echo HTML::encode($one['name']); ?></a><br />
            <?php } ?>
            <?php }else{ ?>
                <span class="grey">Турниры не найдены...</span>
            <?php } ?>
        </td>
    </tr>
</table>