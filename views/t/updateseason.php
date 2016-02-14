<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use app\models\Season;

$color_table = '#'.$t['color_table'];
$color_text_unit = '#'.$t['color_text_unit'];
$color_text_time = '#'.$t['color_text_time'];
$color_line = '#'.$t['color_line'];
$color_cell = '#'.$t['color_cell'];

$line = '2px solid'.$color_line;

$this->title = 'Изменение '.HTML::encode($season['name']).'('.HTML::encode($t['name']).') | '.Yii::$app->name;
?>


<style>

    .net table{
        width: 100%;
        margin: 0;
        padding: 0;
        background-color: <?php echo $color_table ?>;
    }

    .net tr{
        margin: 0;
        padding: 0;
    }

    .net td{
        margin: 0;
        padding: 0;
        height: 25px;
        text-align: center;
    }

    .th1{
        min-width: 120px;
    }

    .th2{
        width: 50px;
    }

    .td_unit{
        background-color: <?php echo $color_cell ?>;
        border: <?php echo $line; ?>;
        color: red;
        font-size: 18px;
        font-weight: bold;
    }

    .td_time{
        color: <?php echo $color_text_time ?>;
        font-size: 14px;
        font-weight: normal;
    }

    .td_label{
        font-size: 15px;
        font-weight: bold;
    }

    .td_bot{
        border-bottom: <?php echo $line; ?>;
    }

    .td_top{
        border-top: <?php echo $line; ?>;
    }

    .td_r{
        border-right: <?php echo $line; ?>;
    }

    .td_l{
        border-left: <?php echo $line; ?>;
    }

    .td_score{
        width: 30px;
    }

    .button_create{
        width: 400px;
    }
</style>

<div class="container">

<h2>Изменения главной информации сетки "<?php echo $season->name ?>" (<a href="<?php echo Yii::$app->urlManager->createUrl(['t/view', 'id'=>$t['id']]); ?>"><?php echo $t->name; ?></a>)</h2>

<?php $form = ActiveForm::begin(); ?>

    <p>
        <?= $form->field($season, 'name')
            ->textInput(['size'=>'10', 'maxlength'=>'10', 'placeholder'=>'Season 1'])
            ->label('Название турнирной сетки <span class="desc_field" >(максимально 10 символов. Пример: "Сезон 2", "Этап четвертый")</span>') ?>
    </p>
    <p>
        <?= $form->field($season, 'time_action')
            ->textInput(['size'=>'20', 'maxlength'=>'20', 'placeholder'=>'01.01.16-03.01.16'])
            ->label('Время проведения <span class="desc_field" >(необязательно к заполнению, максимально 20 символов. Пример: "20-24 августа")</span>') ?>
    </p>
    <p>
        <?= $form->field($season, 'net_type')
            ->dropDownList(Season::nets(2))
            ->label('Вид турнирной сетки <span style="color: red">(все виды сеток Вы можете посмотреть ' . Html::a('здесь','/t/allnets', ['target'=>'_blank']) . ')</span>') ?>
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

    <p>
        <?= Html::submitButton('Сохранить изменения в сезоне', ['class' => 'button_create']) ?>
    </p>
<?php //ActiveForm::end(); ?>

</div>

<hr />

<?php

$l = [];//label названия над ячейками
$l['winner'] = '<span class="td_label">Победитель</span>';
$l['place3'] = '<span class="td_label">3 место</span>';

//$form = ActiveForm::begin();

$s = []; // аррай сезона

/////////// U N I T ////////////////////////////////////////////////
if($season->score_open==0){
    for($i=1; $i<=32; $i++){
        $s['unit'.$i] = '<td class="td_unit">'.$form->field($season, 'unit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').'</td>';
    }
    for($i=1; $i<=16; $i++){
        $s['uunit'.$i] = '<td class="td_unit">'.$form->field($season, 'uunit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').'</td>';
    }
    for($i=1; $i<=8; $i++){
        $s['uuunit'.$i] = '<td class="td_unit">'.$form->field($season, 'uuunit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').'</td>';
    }
    for($i=1; $i<=4; $i++){
        $s['uuuunit'.$i] = '<td class="td_unit">'.$form->field($season, 'uuuunit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').'</td>';
    }
    $s['uuuuunit1'] = '<td class="td_unit">'.$form->field($season, 'uuuuunit1')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').'</td>';
    $s['uuuuunit2'] = '<td class="td_unit">'.$form->field($season, 'uuuuunit2')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').'</td>';
    $s['unit_winner'] = '<td class="td_unit">'.$form->field($season, 'unit_winner')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').'</td>';

    $s['unit3place1'] = '<td class="td_unit">'.$form->field($season, 'unit3place1')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').'</td>';
    $s['unit3place2'] = '<td class="td_unit">'.$form->field($season, 'unit3place2')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').'</td>';
    $s['unit3place3'] = '<td class="td_unit">'.$form->field($season, 'unit3place3')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').'</td>';
}

if($season->score_open==1){
    for($i=1; $i<=32; $i++){
        $s['unit'.$i] = '<td class="td_unit">'.$form->field($season, 'unit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').' '.$form->field($season, 'score'.$i)->textInput(['size'=>'1', 'maxlength'=>'3'])->label('п/б: ').'</td>';
    }
    for($i=1; $i<=16; $i++){
        $s['uunit'.$i] = '<td class="td_unit">'.$form->field($season, 'uunit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').' '.$form->field($season, 'sscore'.$i)->textInput(['size'=>'1', 'maxlength'=>'3'])->label('п/б: ').'</td>';
    }
    for($i=1; $i<=8; $i++){
        $s['uuunit'.$i] = '<td class="td_unit">'.$form->field($season, 'uuunit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').' '.$form->field($season, 'ssscore'.$i)->textInput(['size'=>'1', 'maxlength'=>'3'])->label('п/б: ').'</td>';
    }
    for($i=1; $i<=4; $i++){
        $s['uuuunit'.$i] = '<td class="td_unit">'.$form->field($season, 'uuuunit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').' '.$form->field($season, 'sssscore'.$i)->textInput(['size'=>'1', 'maxlength'=>'3'])->label('п/б: ').'</td>';
    }
    $s['uuuuunit1'] = '<td class="td_unit">'.$form->field($season, 'uuuuunit1')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').' '.$form->field($season, 'ssssscore1')->textInput(['size'=>'1', 'maxlength'=>'3'])->label('п/б: ').'</td>';
    $s['uuuuunit2'] = '<td class="td_unit">'.$form->field($season, 'uuuuunit2')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').' '.$form->field($season, 'ssssscore2')->textInput(['size'=>'1', 'maxlength'=>'3'])->label('п/б: ').'</td>';
    $s['unit_winner'] = '<td class="td_unit">'.$form->field($season, 'unit_winner')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').'</td>';

    $s['unit3place1'] = '<td class="td_unit">'.$form->field($season, 'unit3place1')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').' '.$form->field($season, 'score3place1')->textInput(['size'=>'1', 'maxlength'=>'3'])->label('п/б: ').'</td>';
    $s['unit3place2'] = '<td class="td_unit">'.$form->field($season, 'unit3place2')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').' '.$form->field($season, 'score3place2')->textInput(['size'=>'1', 'maxlength'=>'3'])->label('п/б: ').'</td>';
    $s['unit3place3'] = '<td class="td_unit">'.$form->field($season, 'unit3place3')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('у:').'</td>';
}



/////////// T I M E //////////////////////////////////////////////
for($i=1; $i<=16; $i++){
    $s['time'.$i] = '<td class="td_time">'.$form->field($season, 'time'.$i)->textInput(['size'=>'16', 'maxlength'=>'16'])->label('в:').'</td>';
}
for($i=1; $i<=8; $i++){
    $s['ttime'.$i] = '<td class="td_time">'.$form->field($season, 'ttime'.$i)->textInput(['size'=>'16', 'maxlength'=>'16'])->label('в:').'</td>';
}
for($i=1; $i<=4; $i++){
    $s['tttime'.$i] = '<td class="td_time">'.$form->field($season, 'tttime'.$i)->textInput(['size'=>'16', 'maxlength'=>'16'])->label('в:').'</td>';
}
$s['ttttime1'] = '<td class="td_time">'.$form->field($season, 'ttttime1')->textInput(['size'=>'16', 'maxlength'=>'16'])->label('в:').'</td>';
$s['ttttime2'] = '<td class="td_time">'.$form->field($season, 'ttttime2')->textInput(['size'=>'16', 'maxlength'=>'16'])->label('в:').'</td>';
$s['time_final'] = '<td class="td_time">'.$form->field($season, 'time_final')->textInput(['size'=>'16', 'maxlength'=>'16'])->label('в:').'</td>';
$s['time3place'] = '<td class="td_time">'.$form->field($season, 'time3place')->textInput(['size'=>'16', 'maxlength'=>'16'])->label('в:').'</td>';
?>


<div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xm-12">
            <h2>Изменения в турнирной сетке</h2>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12 col-xm-12">
            <span style="color: #39b3d7; font-size: small; font-style: italic;">
                <strong>У:</strong> участник (максимум 12 символов). Пример, "Team Arbuzzz"<br />
                <strong>В:</strong> время/др.информация (максимум 20 символов). Пример, "20 апр. после 21.00" или "у TMP тех.луз" или "207:150"
            </span>
            <br />
            <span style="color: red; font-size: smaller;">
                (Вы админ и можете быстро изменять название команд и содержимое ячеек
                <strong>на главной странице турнира</strong> -
                просто перейдите на страницу турнира и два раза кликните мышью на ячейку)
            </span>
        </div>
    </div>
</div>

<?php echo $this->render('nets/_update_net'.$season->net_type, ['s'=>$s]); ?>



<p>
    <?= Html::submitButton('Сохранить изменения в турнирной сетке', ['class' => 'button_create']) ?>
</p>
<?php ActiveForm::end(); ?>

<hr />

<script>
    function openOtherParamSeason(){
        $('#divOtherParamSeason').toggle();
    }
</script>