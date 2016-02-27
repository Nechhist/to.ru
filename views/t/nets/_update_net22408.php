<?php

$vs_img = '<img src="/images/vs.png" width="40px"/>';


$bg_table_color = 'ffffff';
$border_color = '999999';
$bg_unit_color = 'cccccc';
$text_unit_color = '000000';
$text_time_color = '000000';

//////////////////// UNIT //////////////////////

// == Юниты в шапке сетки
$unit_a1 = $s['unit1'];
$unit_a2 = $s['unit2'];
$unit_a3 = $s['unit3'];
$unit_a4 = $s['unit4'];

$unit_b1 = $s['unit5'];
$unit_b2 = $s['unit6'];
$unit_b3 = $s['unit7'];
$unit_b4 = $s['unit8'];

$unit_c1 = $s['unit9'];
$unit_c2 = $s['unit10'];
$unit_c3 = $s['unit11'];
$unit_c4 = $s['unit12'];

$unit_d1 = $s['unit13'];
$unit_d2 = $s['unit14'];
$unit_d3 = $s['unit15'];
$unit_d4 = $s['unit16'];

$unit_f1 = $s['uunit1'];
$unit_f2 = $s['uunit2'];
$unit_f3 = $s['uunit3'];
$unit_f4 = $s['uunit4'];

// ======= Юниты в нижней части сетки
// вырезаем функцию замены
$unit_a1_1 = $unit_a1_2 = $unit_a1_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_a2_1 = $unit_a2_2 = $unit_a2_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_a3_1 = $unit_a3_2 = $unit_a3_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_a4_1 = $unit_a4_2 = $unit_a4_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';

$unit_b1_1 = $unit_b1_2 = $unit_b1_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_b2_1 = $unit_b2_2 = $unit_b2_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_b3_1 = $unit_b3_2 = $unit_b3_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_b4_1 = $unit_b4_2 = $unit_b4_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';

$unit_c1_1 = $unit_c1_2 = $unit_c1_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_c2_1 = $unit_c2_2 = $unit_c2_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_c3_1 = $unit_c3_2 = $unit_c3_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_c4_1 = $unit_c4_2 = $unit_c4_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';

$unit_d1_1 = $unit_d1_2 = $unit_d1_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_d2_1 = $unit_d2_2 = $unit_d2_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_d3_1 = $unit_d3_2 = $unit_d3_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_d4_1 = $unit_d4_2 = $unit_d4_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';

$unit_f1_1 = $unit_f1_2 = $unit_f1_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_f2_1 = $unit_f2_2 = $unit_f2_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_f3_1 = $unit_f3_2 = $unit_f3_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';
$unit_f4_1 = $unit_f4_2 = $unit_f4_3 = '<td class="td_unit" ondblclick="notSendFromGroupCellUnit()">' . $season['unit1'] . '</td>';


///////////////////////// TIME  //////////////////////////
if($s['time1']!=NULL) $time_a1 = $s['time1']; else $time_a1 = $vs_img;
if($s['time2']!=NULL) $time_a2 = $s['time2']; else $time_a2 = $vs_img;
if($s['time3']!=NULL) $time_a3 = $s['time3']; else $time_a3 = $vs_img;
if($s['time4']!=NULL) $time_a4 = $s['time4']; else $time_a4 = $vs_img;
if($s['time5']!=NULL) $time_a5 = $s['time5']; else $time_a5 = $vs_img;
if($s['time6']!=NULL) $time_a6 = $s['time6']; else $time_a6 = $vs_img;

if($s['time7']!=NULL) $time_b1 = $s['time7']; else $time_b1 = $vs_img;
if($s['time8']!=NULL) $time_b2 = $s['time8']; else $time_b2 = $vs_img;
if($s['time9']!=NULL) $time_b3 = $s['time9']; else $time_b3 = $vs_img;
if($s['time10']!=NULL) $time_b4 = $s['time10']; else $time_b4 = $vs_img;
if($s['time11']!=NULL) $time_b5 = $s['time11']; else $time_b5 = $vs_img;
if($s['time12']!=NULL) $time_b6 = $s['time12']; else $time_b6 = $vs_img;

if($s['time13']!=NULL) $time_c1 = $s['time13']; else $time_c1 = $vs_img;
if($s['time14']!=NULL) $time_c2 = $s['time14']; else $time_c2 = $vs_img;
if($s['time15']!=NULL) $time_c3 = $s['time15']; else $time_c3 = $vs_img;
if($s['time16']!=NULL) $time_c4 = $s['time16']; else $time_c4 = $vs_img;
if($s['ttime1']!=NULL) $time_c5 = $s['ttime1']; else $time_c5 = $vs_img;
if($s['ttime2']!=NULL) $time_c6 = $s['ttime2']; else $time_c6 = $vs_img;

if($s['ttime3']!=NULL) $time_d1 = $s['ttime3']; else $time_a1 = $vs_img;
if($s['ttime4']!=NULL) $time_d2 = $s['ttime4']; else $time_a2 = $vs_img;
if($s['ttime5']!=NULL) $time_d3 = $s['ttime5']; else $time_a3 = $vs_img;
if($s['ttime6']!=NULL) $time_d4 = $s['ttime6']; else $time_a4 = $vs_img;
if($s['ttime7']!=NULL) $time_d5 = $s['ttime7']; else $time_a5 = $vs_img;
if($s['ttime8']!=NULL) $time_d6 = $s['ttime8']; else $time_a6 = $vs_img;

if($s['tttime1']!=NULL) $time_f1 = $s['tttime1']; else $time_f1 = $vs_img;
if($s['tttime2']!=NULL) $time_f2 = $s['tttime2']; else $time_f2 = $vs_img;
if($s['tttime3']!=NULL) $time_f3 = $s['tttime3']; else $time_f3 = $vs_img;
if($s['tttime4']!=NULL) $time_f4 = $s['tttime4']; else $time_f4 = $vs_img;
if($s['ttttime1']!=NULL) $time_f5 = $s['ttttime1']; else $time_f5 = $vs_img;
if($s['ttttime2']!=NULL) $time_f6 = $s['ttttime2']; else $time_f6 = $vs_img;





//////////////////////// SCORE /////////////////////////
// ИСПРАВИТЬ! $unit_a1 никогда не будет NULL! исправить на !empty($s['unit1'])
if($unit_a1!=NULL) $score_a1_1 = $s['score1']; else  $score_a1_1 = '';
if($unit_a1!=NULL) $score_a1_2 = $s['score2']; else  $score_a1_2 = '';
if($unit_a1!=NULL) $score_a1_3 = $s['score3']; else  $score_a1_3 = '';
if($unit_a2!=NULL) $score_a2_1 = $s['score4']; else  $score_a2_1 = '';
if($unit_a2!=NULL) $score_a2_2 = $s['score5']; else  $score_a2_2 = '';
if($unit_a2!=NULL) $score_a2_3 = $s['score6']; else  $score_a2_3 = '';
if($unit_a3!=NULL) $score_a3_1 = $s['score7']; else  $score_a3_1 = '';
if($unit_a3!=NULL) $score_a3_2 = $s['score8']; else  $score_a3_2 = '';
if($unit_a3!=NULL) $score_a3_3 = $s['score9']; else  $score_a3_3 = '';
if($unit_a4!=NULL) $score_a4_1 = $s['score10']; else  $score_a4_1 = '';
if($unit_a4!=NULL) $score_a4_2 = $s['score11']; else  $score_a4_2 = '';
if($unit_a4!=NULL) $score_a4_3 = $s['score12']; else  $score_a4_3 = '';

if($unit_b1!=NULL) $score_b1_1 = $s['score13']; else  $score_b1_1 = '';
if($unit_b1!=NULL) $score_b1_2 = $s['score14']; else  $score_b1_2 = '';
if($unit_b1!=NULL) $score_b1_3 = $s['score15']; else  $score_b1_3 = '';
if($unit_b2!=NULL) $score_b2_1 = $s['score16']; else  $score_b2_1 = '';
if($unit_b2!=NULL) $score_b2_2 = $s['score17']; else  $score_b2_2 = '';
if($unit_b2!=NULL) $score_b2_3 = $s['score18']; else  $score_b2_3 = '';
if($unit_b3!=NULL) $score_b3_1 = $s['score19']; else  $score_b3_1 = '';
if($unit_b3!=NULL) $score_b3_2 = $s['score20']; else  $score_b3_2 = '';
if($unit_b3!=NULL) $score_b3_3 = $s['score21']; else  $score_b3_3 = '';
if($unit_b4!=NULL) $score_b4_1 = $s['score22']; else  $score_b4_1 = '';
if($unit_b4!=NULL) $score_b4_2 = $s['score23']; else  $score_b4_2 = '';
if($unit_b4!=NULL) $score_b4_3 = $s['score24']; else  $score_b4_3 = '';

if($unit_c1!=NULL) $score_c1_1 = $s['score25']; else  $score_c1_1 = '';
if($unit_c1!=NULL) $score_c1_2 = $s['score26']; else  $score_c1_2 = '';
if($unit_c1!=NULL) $score_c1_3 = $s['score27']; else  $score_c1_3 = '';
if($unit_c2!=NULL) $score_c2_1 = $s['score28']; else  $score_c2_1 = '';
if($unit_c2!=NULL) $score_c2_2 = $s['score29']; else  $score_c2_2 = '';
if($unit_c2!=NULL) $score_c2_3 = $s['score30']; else  $score_c2_3 = '';
if($unit_c3!=NULL) $score_c3_1 = $s['score31']; else  $score_c3_1 = '';
if($unit_c3!=NULL) $score_c3_2 = $s['score32']; else  $score_c3_2 = '';
if($unit_c3!=NULL) $score_c3_3 = $s['sscore1']; else  $score_c3_3 = '';
if($unit_c4!=NULL) $score_c4_1 = $s['sscore2']; else  $score_c4_1 = '';
if($unit_c4!=NULL) $score_c4_2 = $s['sscore3']; else  $score_c4_2 = '';
if($unit_c4!=NULL) $score_c4_3 = $s['sscore4']; else  $score_c4_3 = '';

if($unit_d1!=NULL) $score_d1_1 = $s['sscore5']; else  $score_d1_1 = '';
if($unit_d1!=NULL) $score_d1_2 = $s['sscore6']; else  $score_d1_2 = '';
if($unit_d1!=NULL) $score_d1_3 = $s['sscore7']; else  $score_d1_3 = '';
if($unit_d2!=NULL) $score_d2_1 = $s['sscore8']; else  $score_d2_1 = '';
if($unit_d2!=NULL) $score_d2_2 = $s['sscore9']; else  $score_d2_2 = '';
if($unit_d2!=NULL) $score_d2_3 = $s['sscore10']; else  $score_d2_3 = '';
if($unit_d3!=NULL) $score_d3_1 = $s['sscore11']; else  $score_d3_1 = '';
if($unit_d3!=NULL) $score_d3_2 = $s['sscore12']; else  $score_d3_2 = '';
if($unit_d3!=NULL) $score_d3_3 = $s['sscore13']; else  $score_d3_3 = '';
if($unit_d4!=NULL) $score_d4_1 = $s['sscore14']; else  $score_d4_1 = '';
if($unit_d4!=NULL) $score_d4_2 = $s['sscore15']; else  $score_d4_2 = '';
if($unit_d4!=NULL) $score_d4_3 = $s['sscore16']; else  $score_d4_3 = '';

if($unit_f1!=NULL) $score_f1_1 = $s['ssscore1']; else  $score_f1_1 = '';
if($unit_f1!=NULL) $score_f1_2 = $s['ssscore2']; else  $score_f1_2 = '';
if($unit_f1!=NULL) $score_f1_3 = $s['ssscore3']; else  $score_f1_3 = '';
if($unit_f2!=NULL) $score_f2_1 = $s['ssscore4']; else  $score_f2_1 = '';
if($unit_f2!=NULL) $score_f2_2 = $s['ssscore5']; else  $score_f2_2 = '';
if($unit_f2!=NULL) $score_f2_3 = $s['ssscore6']; else  $score_f2_3 = '';
if($unit_f3!=NULL) $score_f3_1 = $s['ssscore7']; else  $score_f3_1 = '';
if($unit_f3!=NULL) $score_f3_2 = $s['ssscore8']; else  $score_f3_2 = '';
if($unit_f3!=NULL) $score_f3_3 = $s['sssscore1']; else  $score_f3_3 = '';
if($unit_f4!=NULL) $score_f4_1 = $s['sssscore2']; else  $score_f4_1 = '';
if($unit_f4!=NULL) $score_f4_2 = $s['sssscore3']; else  $score_f4_2 = '';
if($unit_f4!=NULL) $score_f4_3 = $s['sssscore4']; else  $score_f4_3 = '';


$score_a1 = $s['score_a1'];
$score_a2 = $s['score_a2'];
$score_a3 = $s['score_a3'];
$score_a4 = $s['score_a4'];
$score_b1 = $s['score_b1'];
$score_b2 = $s['score_b2'];
$score_b3 = $s['score_b3'];
$score_b4 = $s['score_b4'];
$score_c1 = $s['score_c1'];
$score_c2 = $s['score_c2'];
$score_c3 = $s['score_c3'];
$score_c4 = $s['score_c4'];
$score_d1 = $s['score_d1'];
$score_d2 = $s['score_d2'];
$score_d3 = $s['score_d3'];
$score_d4 = $s['score_d4'];
$score_f1 = $s['score_f1'];
$score_f2 = $s['score_f2'];
$score_f3 = $s['score_f3'];
$score_f4 = $s['score_f4'];


?>

<style>

    .td_score{
        border: 2px solid #666666;
        font-weight: bold;
        font-size: 14pt;
        width: 40px;
        background-color: #ffffff;
    }

    .td_time{
        width: 100px;
        font-weight: bold;
        color: #<?php echo $text_time_color; ?>;
    }

    .tr{
        height: 35px;
        text-align: center;
    }

    .td_head1, .td_head2 {
        font-weight: bold;
    }


</style>

<!-- Сетка финалистов в шапке -->
<table border="0px" cellpadding="0px" cellspacing="0px" align="center">
    <tr class="tr"><td class="th1">Группа FINAL</td><td class="th2"></td></tr>
    <tr class="tr"><?php echo $unit_f1; ?><?php echo $score_f1; ?></tr>
    <tr class="tr"><?php echo $unit_f2; ?><?php echo $score_f2; ?></tr>
    <tr class="tr"><?php echo $unit_f3; ?><?php echo $score_f3; ?></tr>
    <tr class="tr"><?php echo $unit_f4; ?><?php echo $score_f4; ?></tr>
</table>

<br />
<br />

<!-- Сетка учатников в шапке -->
<table border="0px" cellpadding="0px" cellspacing="0px" align="center">
    <tr class="tr">
        <td class="td_head1">Группа A</td><td class="td_head2"></td><td class="td_head2">____</td>
        <td class="td_head1">Группа B</td><td class="td_head2"></td>
    </tr>
    <tr class="tr">
        <?php echo $unit_a1; ?><?php echo $score_a1; ?><td></td>
        <?php echo $unit_b1; ?><?php echo $score_b1; ?>
    </tr>
    <tr class="tr">
        <?php echo $unit_a2; ?><?php echo $score_a2; ?><td></td>
        <?php echo $unit_b2; ?><?php echo $score_b2; ?>
    </tr>
    <tr class="tr">
        <?php echo $unit_a3; ?><?php echo $score_a3; ?><td></td>
        <?php echo $unit_b3; ?><?php echo $score_b3; ?>
    </tr>
    <tr class="tr">
        <?php echo $unit_a4; ?><?php echo $score_a4; ?><td></td>
        <?php echo $unit_b4; ?><?php echo $score_b4; ?>
    </tr>
</table>

<br />
<br />

<!-- G R O U P   A -->
<table border="0px" cellpadding="0px" cellspacing="0px" align="center">
    <tr class="tr"><td class="th1"></td>     <td class="td_head2"></td>    <td class="td_head1">Группа A</td><td class="td_head2"></td>    <td class="th1"></td>    </tr>
    <tr class="tr"><?php echo $unit_a1_1; ?>      <?php echo $score_a1_1; ?>    <?php echo $time_a1 ?>            <?php echo $score_a3_2; ?>    <?php echo $unit_a3_2; ?>     </tr>
    <tr class="tr"><?php echo $unit_a1_2; ?>      <?php echo $score_a1_2; ?>    <?php echo $time_a2 ?>            <?php echo $score_a4_1; ?>    <?php echo $unit_a4_1; ?>     </tr>
    <tr class="tr"><?php echo $unit_a2_1; ?>      <?php echo $score_a2_1; ?>    <?php echo $time_a3 ?>            <?php echo $score_a3_3; ?>    <?php echo $unit_a3_3; ?>     </tr>
    <tr class="tr"><?php echo $unit_a1_3; ?>      <?php echo $score_a1_3; ?>    <?php echo $time_a4 ?>            <?php echo $score_a2_3; ?>    <?php echo $unit_a2_3; ?>     </tr>
    <tr class="tr"><?php echo $unit_a2_2; ?>      <?php echo $score_a2_2; ?>    <?php echo $time_a5 ?>            <?php echo $score_a4_2; ?>    <?php echo $unit_a4_2; ?>     </tr>
    <tr class="tr"><?php echo $unit_a3_1; ?>      <?php echo $score_a3_1; ?>    <?php echo $time_a6 ?>            <?php echo $score_a4_3; ?>    <?php echo $unit_a4_3; ?>     </tr>
</table>

<br />
<br />

<!-- G R O U P   B -->
<table border="0px" cellpadding="0px" cellspacing="0px" align="center">
    <tr class="tr"><td class="th1"></td>       <td class="td_head2"></td>    <td class="td_head1">Группа B</td><td class="td_head2"></td>  <td class="th1"></td>  </tr>
    <tr class="tr"><?php echo $unit_b1_1; ?>       <?php echo $score_b1_1; ?>    <?php echo $time_b1 ?>          <?php echo $score_b3_2; ?>    <?php echo $unit_b3_2; ?>   </tr>
    <tr class="tr"><?php echo $unit_b1_2; ?>       <?php echo $score_b1_2; ?>    <?php echo $time_b2 ?>          <?php echo $score_b4_1; ?>    <?php echo $unit_b4_1; ?>   </tr>
    <tr class="tr"><?php echo $unit_b2_1; ?>       <?php echo $score_b2_1; ?>    <?php echo $time_b3 ?>          <?php echo $score_b3_3; ?>    <?php echo $unit_b3_3; ?>   </tr>
    <tr class="tr"><?php echo $unit_b1_3; ?>       <?php echo $score_b1_3; ?>    <?php echo $time_b4 ?>          <?php echo $score_b2_3; ?>    <?php echo $unit_b2_3; ?>   </tr>
    <tr class="tr"><?php echo $unit_b2_2; ?>       <?php echo $score_b2_2; ?>    <?php echo $time_b5 ?>          <?php echo $score_b4_2; ?>    <?php echo $unit_b4_2; ?>   </tr>
    <tr class="tr"><?php echo $unit_b3_1; ?>       <?php echo $score_b3_1; ?>    <?php echo $time_b6 ?>          <?php echo $score_b4_3; ?>    <?php echo $unit_b4_3; ?>   </tr>
</table>

<br />
<br />


<!-- G R O U P   FINAL -->
<table border="0px" cellpadding="0px" cellspacing="0px" align="center">
    <tr class="tr"><td class="th1"></td>       <td class="td_head2"></td>   <td class="td_head1">Группа FINAL</td><td class="td_head2"></td><td class="th1"></td></tr>
    <tr class="tr"><?php echo $unit_f1_1; ?>       <?php echo $score_f1_1; ?>    <?php echo $time_f1 ?>  <?php echo $score_f3_2; ?>    <?php echo $unit_f3_2; ?>   </tr>
    <tr class="tr"><?php echo $unit_f1_2; ?>       <?php echo $score_f1_2; ?>    <?php echo $time_f2 ?>  <?php echo $score_f4_1; ?>    <?php echo $unit_f4_1; ?>   </tr>
    <tr class="tr"><?php echo $unit_f2_1; ?>       <?php echo $score_f2_1; ?>    <?php echo $time_f3 ?>  <?php echo $score_f3_3; ?>    <?php echo $unit_f3_3; ?>   </tr>
    <tr class="tr"><?php echo $unit_f1_3; ?>       <?php echo $score_f1_3; ?>    <?php echo $time_f4 ?>  <?php echo $score_f2_3; ?>    <?php echo $unit_f2_3; ?>   </tr>
    <tr class="tr"><?php echo $unit_f2_2; ?>       <?php echo $score_f2_2; ?>    <?php echo $time_f5 ?>  <?php echo $score_f4_2; ?>    <?php echo $unit_f4_2; ?>   </tr>
    <tr class="tr"><?php echo $unit_f3_1; ?>       <?php echo $score_f3_1; ?>    <?php echo $time_f6 ?>  <?php echo $score_f4_3; ?>    <?php echo $unit_f4_3; ?>   </tr>
</table>

<br />
<br />