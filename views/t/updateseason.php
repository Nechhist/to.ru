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

    /******** переопределение стилей BOOTSTRAP *********/

    .form-group{
        margin-bottom: 1px;
    }

    /**************************************************/

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

<h2>Изменения главной информации сетки "<?php echo Html::encode($season->name) ?>"
    (<?=Html::a(Html::encode($t->name), '/' . $t['id'])?>)
</h2>

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


$s = []; // аррай сезона

/////////// U N I T ////////////////////////////////////////////////
if($season->score_open==0 OR Season::nets()[$season['net_type']]['type'] == 2){
    for($i=1; $i<=32; $i++){
        $s['unit'.$i] = '<td class="td_unit">'.$form->field($season, 'unit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').'</td>';
    }
    for($i=1; $i<=16; $i++){
        $s['uunit'.$i] = '<td class="td_unit">'.$form->field($season, 'uunit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').'</td>';
    }
    for($i=1; $i<=8; $i++){
        $s['uuunit'.$i] = '<td class="td_unit">'.$form->field($season, 'uuunit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').'</td>';
    }
    for($i=1; $i<=4; $i++){
        $s['uuuunit'.$i] = '<td class="td_unit">'.$form->field($season, 'uuuunit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').'</td>';
    }
    $s['uuuuunit1'] = '<td class="td_unit">'.$form->field($season, 'uuuuunit1')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').'</td>';
    $s['uuuuunit2'] = '<td class="td_unit">'.$form->field($season, 'uuuuunit2')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').'</td>';
    $s['unit_winner'] = '<td class="td_unit">'.$form->field($season, 'unit_winner')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').'</td>';

    $s['unit3place1'] = '<td class="td_unit">'.$form->field($season, 'unit3place1')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').'</td>';
    $s['unit3place2'] = '<td class="td_unit">'.$form->field($season, 'unit3place2')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').'</td>';
    $s['unit3place3'] = '<td class="td_unit">'.$form->field($season, 'unit3place3')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').'</td>';
}

if($season->score_open==1 AND Season::nets()[$season['net_type']]['type'] == 1){
    for($i=1; $i<=32; $i++){
        $s['unit'.$i] = '<td class="td_unit">'.$form->field($season, 'unit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').' '.$form->field($season, 'score'.$i)->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    }
    for($i=1; $i<=16; $i++){
        $s['uunit'.$i] = '<td class="td_unit">'.$form->field($season, 'uunit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').' '.$form->field($season, 'sscore'.$i)->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    }
    for($i=1; $i<=8; $i++){
        $s['uuunit'.$i] = '<td class="td_unit">'.$form->field($season, 'uuunit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').' '.$form->field($season, 'ssscore'.$i)->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    }
    for($i=1; $i<=4; $i++){
        $s['uuuunit'.$i] = '<td class="td_unit">'.$form->field($season, 'uuuunit'.$i)->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').' '.$form->field($season, 'sssscore'.$i)->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    }
    $s['uuuuunit1'] = '<td class="td_unit">'.$form->field($season, 'uuuuunit1')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').' '.$form->field($season, 'ssssscore1')->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    $s['uuuuunit2'] = '<td class="td_unit">'.$form->field($season, 'uuuuunit2')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').' '.$form->field($season, 'ssssscore2')->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    $s['unit_winner'] = '<td class="td_unit">'.$form->field($season, 'unit_winner')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').'</td>';

    $s['unit3place1'] = '<td class="td_unit">'.$form->field($season, 'unit3place1')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').' '.$form->field($season, 'score3place1')->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    $s['unit3place2'] = '<td class="td_unit">'.$form->field($season, 'unit3place2')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').' '.$form->field($season, 'score3place2')->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    $s['unit3place3'] = '<td class="td_unit">'.$form->field($season, 'unit3place3')->textInput(['size'=>'12', 'maxlength'=>'12'])->label('участник:').'</td>';
}



/////////// T I M E //////////////////////////////////////////////
for($i=1; $i<=16; $i++){
    $s['time'.$i] = '<td class="td_time">'.$form->field($season, 'time'.$i)->textInput(['size'=>'16', 'maxlength'=>'16'])->label('время:').'</td>';
}
for($i=1; $i<=8; $i++){
    $s['ttime'.$i] = '<td class="td_time">'.$form->field($season, 'ttime'.$i)->textInput(['size'=>'16', 'maxlength'=>'16'])->label('время:').'</td>';
}
for($i=1; $i<=4; $i++){
    $s['tttime'.$i] = '<td class="td_time">'.$form->field($season, 'tttime'.$i)->textInput(['size'=>'16', 'maxlength'=>'16'])->label('время:').'</td>';
}
$s['ttttime1'] = '<td class="td_time">'.$form->field($season, 'ttttime1')->textInput(['size'=>'16', 'maxlength'=>'16'])->label('время:').'</td>';
$s['ttttime2'] = '<td class="td_time">'.$form->field($season, 'ttttime2')->textInput(['size'=>'16', 'maxlength'=>'16'])->label('время:').'</td>';
$s['time_final'] = '<td class="td_time">'.$form->field($season, 'time_final')->textInput(['size'=>'16', 'maxlength'=>'16'])->label('время:').'</td>';
$s['time3place'] = '<td class="td_time">'.$form->field($season, 'time3place')->textInput(['size'=>'16', 'maxlength'=>'16'])->label('время:').'</td>';
?>

<?php if(Season::nets()[$season['net_type']]['type'] == 2){

    for($i=1; $i<=32; $i++){
        $s['score'.$i] = '<td class="td_score">' . $form->field($season, 'score'.$i)->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    }
    for($i=1; $i<=16; $i++){
        $s['sscore'.$i] = '<td class="td_score">' . $form->field($season, 'sscore'.$i)->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    }
    for($i=1; $i<=8; $i++){
        $s['ssscore'.$i] = '<td class="td_score">' . $form->field($season, 'ssscore'.$i)->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    }
    for($i=1; $i<=4; $i++){
        $s['sssscore'.$i] = '<td class="td_score">' . $form->field($season, 'sssscore'.$i)->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    }
    $s['ssssscore'] = '<td class="td_score">' . $form->field($season, 'ssssscore1')->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    $s['ssssscore'] = '<td class="td_score">' . $form->field($season, 'ssssscore2')->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';

    $s['score3place1'] = '<td class="td_score">' . $form->field($season, 'score3place1')->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';
    $s['score3place2'] = '<td class="td_score">' . $form->field($season, 'score3place2')->textInput(['size'=>'1', 'maxlength'=>'3'])->label('').'</td>';


    $s['score_a1'] = '<td class="td_score" id="' . $season['id'] . 'score_a1" ondblclick="notSendFromGroupCellScore()">' . ($season['score1'] + $season['score2'] + $season['score3']) . '</td>';
    $s['score_a2'] = '<td class="td_score" id="' . $season['id'] . 'score_a2" ondblclick="notSendFromGroupCellScore()">' . ($season['score4'] + $season['score5'] + $season['score6']) . '</td>';
    $s['score_a3'] = '<td class="td_score" id="' . $season['id'] . 'score_a3" ondblclick="notSendFromGroupCellScore()">' . ($season['score7'] + $season['score8'] + $season['score9']) . '</td>';
    $s['score_a4'] = '<td class="td_score" id="' . $season['id'] . 'score_a4" ondblclick="notSendFromGroupCellScore()">' . ($season['score10'] + $season['score11'] + $season['score12']) . '</td>';

    $s['score_b1'] = '<td class="td_score" id="' . $season['id'] . 'score_b1" ondblclick="notSendFromGroupCellScore()">' . ($season['score13'] + $season['score14'] + $season['score15']) . '</td>';
    $s['score_b2'] = '<td class="td_score" id="' . $season['id'] . 'score_b2" ondblclick="notSendFromGroupCellScore()">' . ($season['score16'] + $season['score17'] + $season['score18']) . '</td>';
    $s['score_b3'] = '<td class="td_score" id="' . $season['id'] . 'score_b3" ondblclick="notSendFromGroupCellScore()">' . ($season['score19'] + $season['score20'] + $season['score21']) . '</td>';
    $s['score_b4'] = '<td class="td_score" id="' . $season['id'] . 'score_b4" ondblclick="notSendFromGroupCellScore()">' . ($season['score22'] + $season['score23'] + $season['score24']) . '</td>';

    $s['score_c1'] = '<td class="td_score" id="' . $season['id'] . 'score_c1" ondblclick="notSendFromGroupCellScore()">' . ($season['score25'] + $season['score26'] + $season['score27']) . '</td>';
    $s['score_c2'] = '<td class="td_score" id="' . $season['id'] . 'score_c2" ondblclick="notSendFromGroupCellScore()">' . ($season['score28'] + $season['score29'] + $season['score30']) . '</td>';
    $s['score_c3'] = '<td class="td_score" id="' . $season['id'] . 'score_c3" ondblclick="notSendFromGroupCellScore()">' . ($season['score31'] + $season['score32'] + $season['sscore1']) . '</td>';
    $s['score_c4'] = '<td class="td_score" id="' . $season['id'] . 'score_c4" ondblclick="notSendFromGroupCellScore()">' . ($season['sscore2'] + $season['sscore3'] + $season['sscore4']) . '</td>';

    $s['score_d1'] = '<td class="td_score" id="' . $season['id'] . 'score_d1" ondblclick="notSendFromGroupCellScore()">' . ($season['sscore5'] + $season['sscore6'] + $season['sscore7']) . '</td>';
    $s['score_d2'] = '<td class="td_score" id="' . $season['id'] . 'score_d2" ondblclick="notSendFromGroupCellScore()">' . ($season['sscore8'] + $season['sscore9'] + $season['sscore10']) . '</td>';
    $s['score_d3'] = '<td class="td_score" id="' . $season['id'] . 'score_d3" ondblclick="notSendFromGroupCellScore()">' . ($season['sscore11'] + $season['sscore12'] + $season['sscore13']) . '</td>';
    $s['score_d4'] = '<td class="td_score" id="' . $season['id'] . 'score_d4" ondblclick="notSendFromGroupCellScore()">' . ($season['sscore14'] + $season['sscore15'] + $season['sscore16']) . '</td>';

    $s['score_f1'] = '<td class="td_score" id="' . $season['id'] . 'score_f1" ondblclick="notSendFromGroupCellScore()">' . ($season['ssscore1'] + $season['ssscore2'] + $season['ssscore3']) . '</td>';
    $s['score_f2'] = '<td class="td_score" id="' . $season['id'] . 'score_f2" ondblclick="notSendFromGroupCellScore()">' . ($season['ssscore4'] + $season['ssscore5'] + $season['ssscore6']) . '</td>';
    $s['score_f3'] = '<td class="td_score" id="' . $season['id'] . 'score_f3" ondblclick="notSendFromGroupCellScore()">' . ($season['ssscore7'] + $season['ssscore8'] + $season['sssscore1']) . '</td>';
    $s['score_f4'] = '<td class="td_score" id="' . $season['id'] . 'score_f4" ondblclick="notSendFromGroupCellScore()">' . ($season['sssscore2'] + $season['sssscore3'] + $season['sssscore4']) . '</td>';

} ?>
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

<?php echo $this->render('nets/_update_net'.$season->net_type, ['s'=>$s, 'season'=>$season]); ?>



<p>
    <?= Html::submitButton('Сохранить изменения в турнирной сетке', ['class' => 'button_create']) ?>
</p>
<?php ActiveForm::end(); ?>

<hr />

<script>
    function openOtherParamSeason(){
        $('#divOtherParamSeason').toggle();
    }

    function notSendFromGroupCellUnit(){
        alert('Здесь названия участников появятся автоматически при сохранении страницы. Правьте название участников только в шапочной таблице.');
    }
</script>