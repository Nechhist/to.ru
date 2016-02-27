<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use app\models\Season;

$this->title = 'Создание турнирной сетки | '.Yii::$app->name;
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Турнир онлайн, турнирные сетки']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Создание турнирной сетки']);

?>

<div class="container">

    <div class="row" style="border: 3px solid #39b3d7; margin: 5px; padding: 10px;">

        <h2>Создание турнирной сетки (для <?=Html::a(Html::encode($t->name), '/' . $t['id'])?>)
        </h2>

        <div class="red">(Все параметры Вы можете впоследствии многократно изменять)</div>

        <?php $form = ActiveForm::begin(); ?>

        <p>
            <?= $form->field($season, 'name')
                ->textInput(['size'=>'10', 'maxlength'=>'10', 'placeholder'=>'Season 1'])
                ->label('Название турнирной сетки / сезона <span class="desc_field" >(максимально 10 символов. Пример: "Сезон 2", "Этап четвертый")</span>') ?>
        </p>
        <p>
            <?= $form->field($season, 'time_action')
                ->textInput(['size'=>'20', 'maxlength'=>'20', 'placeholder'=>'01.01.16-03.01.16'])
                ->label('Время проведения <span class="desc_field" >(необязательно к заполнению, максимально 20 символов. Пример: "20-24 августа")</span>') ?>
        </p>
        <p>
            <?= $form->field($season, 'net_type')
            ->dropDownList(Season::nets(2))
            ->label('Вид турнирной сетки <span style="color: red">(Все виды сеток Вы можете посмотреть в таблице ниже)</span>') ?>
        </p>

        <p>
            <a onclick="openOtherParamSeason()" style="cursor: pointer">Другие параметры (развернуть)</a>
        </p>
        <div id="divOtherParamSeason" style="display: none">
            <p>
                <?= $form->field($season, 'unit_type')->dropDownList(['0'=>'ничего не указывать', '1'=>'игроки', '2'=>'команды']) ?>
            </p>
            <p>
                <?= $form->field($season, 'score_open')->dropDownList(['0'=>'не показывать', '1'=>'показывать']) ?>
            </p>
            <p>
                <?= $form->field($season, 'invisible')->dropDownList(['0'=>'виден всем', '1'=>'видет только по ссылке']) ?>
            </p>
            <p>
                <?= $form->field($season, 'zayavka_open')->dropDownList(['0'=>'закрыт', '1'=>'открыт']) ?>
            </p>
        </div>

        <p style="text-align: left">
            <?= Html::submitButton('Создать турнирную сетку', ['class' => 'button_creat_tournament']) ?>
            <span class="grey">(все параметры сезона Вы можете многократно изменять после создания сезона, даже турнирную сетку)</span>
        </p>
        <?php ActiveForm::end(); ?>

    </div>

    <p><br /></p>

    <?php echo $this->render('allnets') ?>

</div>


<script>
    function openOtherParamSeason(){
        $('#divOtherParamSeason').toggle();
    }
</script>