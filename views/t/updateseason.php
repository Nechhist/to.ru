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


<hr />
<?php $form = ActiveForm::begin(); ?>
    <table style="width: 100%; vertical-align: top;">
        <tr>
            <td>
                <h2>Изменения в сезоне "<?php echo $season->name ?>" (<a href="<?php echo Yii::$app->urlManager->createUrl(['t/view', 'id'=>$t['id']]); ?>"><?php echo $t->name; ?></a>)</h2>
                <p><?= $form->field($season, 'name')->textInput(['size'=>'16', 'maxlength'=>'16']) ?>  <span class="desc_field" >максимально 16 символов. Пример: "Сезон 1", "Этап четвертый"...</span>
                <p><?= $form->field($season, 'time_action')->textInput(['size'=>'20', 'maxlength'=>'20']) ?>  <span class="desc_field" >максимально 20 символов. Пример: "20-24 августа", "20.08.16 - 24.08.16"...</span>
                <p><?= $form->field($season, 'net_type')->dropDownList(Season::nets(2)); ?>
            </td>
            <td>
                <p style="color: #808080; text-align: right;">Время создания: <?php echo date("d.m.Y в H:i", $season['time']); ?>. Сетка: <?php echo Season::nets(1, $season['net_type']); ?>.</p>
                <p><?= $form->field($season, 'score_open')->dropDownList(['0'=>'не показывать', '1'=>'показывать']) ?>
                <p><?= $form->field($season, 'invisible')->dropDownList(['0'=>'виден всем', '1'=>'скрыть']) ?>
                <p><?= $form->field($season, 'unit_type')->dropDownList(['0'=>'ничего не указывать', '1'=>'игроки', '2'=>'команды']) ?>
                <p><?= $form->field($season, 'zayavka_open')->dropDownList(['0'=>'закрыт', '1'=>'открыт']) ?>
                <p><?= $form->field($season, 'label')->dropDownList(['0'=>'не показывать', '1'=>'показывать']) ?>
            </td>
        </tr>
    </table>

    <p>
        <?= Html::submitButton('Сохранить изменения в сезоне', ['class' => 'button_create']) ?>
    </p>
<?php ActiveForm::end(); ?>

<hr />
<span style="color: grey; font-style: italic ; font-size: smaller;">(прежде чем делать изменения в турниной сетке, сохраните изменения сезона)</span>

<?php

$l = [];//label названия над ячейками
$l['winner'] = '<span class="td_label">Победитель</span>';
$l['place3'] = '<span class="td_label">3 место</span>';

$form = ActiveForm::begin();

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


<table style="width: 100%">
    <tr>
        <td>
            <h2>Изменения в турнирной сетке</h2>
        </td>
        <td style="width: 50%;">
            <span style="color: #39b3d7; font-size: small; font-style: italic;">
                <strong>У:</strong> участник (максимум 12 символов). Пример, "Team Arbuzzz"<br />
                <strong>В:</strong> время/др.информация (максимум 20 символов). Пример, "20 апр. после 21.00" или "у TMP тех.луз" или "207:150"
            </span>
            <br />
            <span style="color: red; font-style: italic ; font-size: smaller;">
                (Вы админ и можете быстро изменять название команд и содержимое ячеек
                <strong>на главной странице турнира</strong> -
                просто перейдите на страницу турнира и два раза кликните мышью на ячейку)
            </span>
        </td>
    </tr>
</table>

<?php echo $this->render('_update_net'.$season->net_type, ['s'=>$s]); ?>



<p>
    <?= Html::submitButton('Сохранить изменения в турнирной сетке', ['class' => 'button_create']) ?>
</p>
<?php ActiveForm::end(); ?>

<hr />
