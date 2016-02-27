<?php
    /* @var $this yii\web\View */

    use app\models\User;
    use yii\helpers\Html;
    use app\models\Season;

    // присвоение цветов //
    $color_table = '#'.$t['color_table'];
    $color_text_unit = '#'.$t['color_text_unit'];
    $color_text_time = '#'.$t['color_text_time'];
    $color_line = '#'.$t['color_line'];
    $color_cell = '#'.$t['color_cell'];
    $line = '2px solid'.$color_line;

    if(trim($t['img'])==null) $t['img'] = Yii::$app->request->baseUrl.'/images/logo_t.png';

    $this->title = HTML::encode($t['name']).' | '.Yii::$app->name;
?>



<style>
    /********************* конец страница вид турниров ************************/
    .t_tbl_info{
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .t_tbl_info td{
        margin: 0;
        padding: 0;
        vertical-align: top;
    }

    /* --------------------- */
    .net table{
        /*width: 100%; */
        margin: 0;
        padding: 0;
        background-color: <?php echo $color_table ?>;
    }

    .net tr{
        margin: 0;
        padding: 0;
    }

    .net td{
        height: 32px;
        text-align: center;
    }

    .th1{
        /*width: 170px; */
    }

    .th2{
        /*min-width: 20px; */
        /*width: 40px; */
    }

    .td_unit{
        background-color: <?php echo $color_cell ?>;
        border: <?php echo $line; ?>;
        color: <?php echo $color_text_unit; ?>;
        font-size: 20px;
        font-weight: bold;
        width: 180px;
        padding: 1px;

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
        width: 40px;
    }

    .td_top{
        border-top: <?php echo $line; ?>;
        width: 40px;
    }

    .td_r{
        border-right: <?php echo $line; ?>;
    }

    .td_l{
        border-left: <?php echo $line; ?>;
    }

    .td_unit0{
        background-color: <?php echo $color_cell ?>;
    //border: <?php echo $line; ?>;
        color: <?php echo $color_text_unit; ?>;
        font-size: 18px;
        font-weight: bold;
        width: 180px;
    }

    .td_score{
    //border: <?php echo $line; ?>;
        background-color: <?php echo $color_cell; ?>;
        color:  <?php echo $color_text_unit; ?>;
        font-weight: bold;
        width: 15%;
    }

    <?php if($t->admin_id == Yii::$app->user->id) { ?>
    .td_unit:hover, .td_time:hover, .td_score:hover{
        background-color: burlywood;
    }
    <?php } ?>
    /********************** конец страница вид турниров ***********************/
</style>




<!------------------------- ВВОДНАЯ ИНФОРМАЦИЯ О ТУРНИРЕ ----------------------------->

<?=$this->render('view/_header.php', ['t' => $t, 'seasons' => $seasons])?>



<!-- Ц И К Л   Т У Р Н И Р Н Ы Х    С Е Т О К -->
<div style="min-height: 350px;">
<?php

$counter = 1; // счетчик сезонов

foreach($seasons as $season){

    // делаем все сетки невидимыми, но последнюю сетку видимой
    $display = 'none';
    if($counter == count($seasons)) $display = 'block';
    $counter++;
    ?>

    <div style="display: <?php echo $display; ?>;" class="s0" id="s<?php echo $season['id']; ?>">



        <!------------------ шапка-полоса сетки ----------------->
        <table style="width: 100%; background-color: #e38d13; text-align: center; margin-bottom: 20px; margin-top: 20px; font-size: x-large; font-weight: bold;">
            <tr>
                <td style="text-align: left; padding-left: 5px;">
                    <span style="">
                        <span style="cursor: pointer; " onclick="document.location.href = '<?php echo \Yii::$app->urlManager->createUrl(['/season']) ?>/<?php echo $season['id']; ?>';">
                            <?php echo HTML::encode($season['name']); ?>
                        </span>
                        <?php if(trim($season['time_action'])!=null) echo '('.HTML::encode($season['time_action']).')'; ?>
                    </span>
                </td>
                <td style="text-align: right;">
                    <span style="color: white; font-size: large;">
                        <?php
                        echo Season::nets(3, $season['net_type']);
                        echo ' ';
                        if($season['unit_type']==0) echo 'участников';
                        if($season['unit_type']==1) echo 'игроков';
                        if($season['unit_type']==2) echo 'команд';
                        ?>
                        (изменено: <span id="time_update<?php echo $season['id']; ?>"><?php echo date('d.m.Y в H:i', $season['time_update']); ?></span>)
                        <?php if($t->admin_id==Yii::$app->user->id) echo '<a href="'.Yii::$app->urlManager->createUrl(['t/updateseason', 'id'=>$season['id']]).'">Настройки сетки</a>'; ?>
                    </span>
                </td>
            </tr>
        </table>



        <?php
        $l = []; //array названия над ячейками
        //if($season['label']==1){
        //    $l['win_top'] = '<td><span class="td_label">Победитель</span></td>';
        //    $l['win_bot'] = '<td class="td_l"></td>';
        //    $l['place3'] = '<td><span class="td_label">3 место</span></td>';
        //    $l['1/2'] = '<th class="th1"><span class="td_label">1/2 (финал)</span></th>';
        //    $l['1/4'] = '<th class="th1"><span class="td_label">1/4</span></th>';
        //    $l['1/8'] = '<th class="th1"><span class="td_label">1/8</span></th>';
        //    $l['1/16'] = '<th class="th1"><span class="td_label">1/16</span></th>';
        //}

        //if($season['label']==0){
            $l['win_top'] = '<th class="th1"></th>';
            $l['win_bot'] = '<td class="td_l"><span class="td_label">Победитель</span></td>';
            $l['place3'] = '<td><span class="td_label">3 место</span></td>';
            $l['1/2'] = '<th class="th1"></th>';
            $l['1/4'] = '<th class="th1"></th>';
            $l['1/8'] = '<th class="th1"></th>';
            $l['1/16'] = '<th class="th1"></th>';
        //}

        $s = []; // массив сезона с участниками и другими, для передачи в рендер сетки

        /////////// U N I T /////////////////////////////////////////////////////
        // ----------------------------------------------------------------------
        if($season['score_open']==0){
            for($i=1; $i<=32; $i++){
                $s['unit'.$i] = '<td class="td_unit" id="'.$season['id'].'unit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'unit'.$i.'\')">'.HTML::encode($season['unit'.$i]).'</td>';
            }
            for($i=1; $i<=16; $i++){
                $s['uunit'.$i] = '<td class="td_unit" id="'.$season['id'].'uunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uunit'.$i.'\')">'.HTML::encode($season['uunit'.$i]).'</td>';
            }
            for($i=1; $i<=8; $i++){
                $s['uuunit'.$i] = '<td class="td_unit" id="'.$season['id'].'uuunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uuunit'.$i.'\')">'.HTML::encode($season['uuunit'.$i]).'</td>';
            }
            for($i=1; $i<=4; $i++){
                $s['uuuunit'.$i] = '<td class="td_unit" id="'.$season['id'].'uuuunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uuuunit'.$i.'\')">'.HTML::encode($season['uuuunit'.$i]).'</td>';
            }
            $s['uuuuunit1'] = '<td class="td_unit" id="'.$season['id'].'uuuuunit1" ondblclick="update_cell_u'.$season['id'].'(\'uuuuunit1\')">'.HTML::encode($season['uuuuunit1']).'</td>';
            $s['uuuuunit2'] = '<td class="td_unit" id="'.$season['id'].'uuuuunit2" ondblclick="update_cell_u'.$season['id'].'(\'uuuuunit2\')">'.HTML::encode($season['uuuuunit2']).'</td>';
            $s['unit_winner'] = '<td class="td_unit" id="'.$season['id'].'unit_winner" ondblclick="update_cell_u'.$season['id'].'(\'unit_winner\')">'.HTML::encode($season['unit_winner']).'</td>';

            $s['unit3place1'] = '<td class="td_unit" id="'.$season['id'].'unit3place1" ondblclick="update_cell_u'.$season['id'].'(\'unit3place1\')">'.HTML::encode($season['unit3place1']).'</td>';
            $s['unit3place2'] = '<td class="td_unit" id="'.$season['id'].'unit3place2" ondblclick="update_cell_u'.$season['id'].'(\'unit3place2\')">'.HTML::encode($season['unit3place2']).'</td>';
            $s['unit3place3'] = '<td class="td_unit" id="'.$season['id'].'unit3place3" ondblclick="update_cell_u'.$season['id'].'(\'unit3place3\')">'.HTML::encode($season['unit3place3']).'</td>';
        }


        if(Season::nets()[$season['net_type']]['type']==1 AND $season['score_open']==1){
            for($i=1; $i<=32; $i++){
                if(trim($season['unit'.$i]!=null)) $s['unit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'unit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'unit'.$i.'\')">'.HTML::encode($season['unit'.$i]).'</td><td class="td_score" id="'.$season['id'].'score'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'score'.$i.'\')">'.$season['score'.$i].'</td></tr></table></td>';
                else $s['unit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'unit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'unit'.$i.'\')">'.HTML::encode($season['unit'.$i]).'</td><td class="td_score" id="'.$season['id'].'score'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'score'.$i.'\')"></td></tr></table></td>';
            }
            for($i=1; $i<=16; $i++){
                if(trim($season['uunit'.$i])!=null) $s['uunit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uunit'.$i.'\')">'.HTML::encode($season['uunit'.$i]).'</td><td class="td_score" id="'.$season['id'].'sscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'sscore'.$i.'\')">'.$season['sscore'.$i].'</td></tr></table></td>';
                else $s['uunit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uunit'.$i.'\')">'.HTML::encode($season['uunit'.$i]).'</td><td class="td_score" id="'.$season['id'].'sscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'sscore'.$i.'\')"></td></tr></table></td>';
            }
            for($i=1; $i<=8; $i++){
                if(trim($season['uuunit'.$i])!=null) $s['uuunit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uuunit'.$i.'\')">'.HTML::encode($season['uuunit'.$i]).'</td><td class="td_score" id="'.$season['id'].'ssscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'ssscore'.$i.'\')">'.$season['ssscore'.$i].'</td></tr></table></td>';
                else $s['uuunit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uuunit'.$i.'\')">'.HTML::encode($season['uuunit'.$i]).'</td><td class="td_score" id="'.$season['id'].'ssscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'ssscore'.$i.'\')"></td></tr></table></td>';
            }
            for($i=1; $i<=4; $i++){
                if(trim($season['uuuunit'.$i])!=null) $s['uuuunit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuuunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uuuunit'.$i.'\')">'.HTML::encode($season['uuuunit'.$i]).'</td><td class="td_score" id="'.$season['id'].'sssscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'sssscore'.$i.'\')">'.$season['sssscore'.$i].'</td></tr></table></td>';
                else $s['uuuunit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuuunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uuuunit'.$i.'\')">'.HTML::encode($season['uuuunit'.$i]).'</td><td class="td_score" id="'.$season['id'].'sssscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'sssscore'.$i.'\')"></td></tr></table></td>';
            }
            if(trim($season['uuuuunit1'])!=null) $s['uuuuunit1'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuuuunit1" ondblclick="update_cell_u'.$season['id'].'(\'uuuuunit1\')">'.HTML::encode($season['uuuuunit1']).'</td><td class="td_score" id="'.$season['id'].'ssssscore1" ondblclick="update_cell_s'.$season['id'].'(\'ssssscore1\')">'.$season['ssssscore1'].'</td></tr></table></td>';
            else $s['uuuuunit1'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuuuunit1" ondblclick="update_cell_u'.$season['id'].'(\'uuuuunit1\')">'.HTML::encode($season['uuuuunit1']).'</td><td class="td_score" id="'.$season['id'].'ssssscore1" ondblclick="update_cell_s'.$season['id'].'(\'ssssscore1\')"></td></tr></table></td>';
            if(trim($season['uuuuunit2'])!=null) $s['uuuuunit2'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuuuunit2" ondblclick="update_cell_u'.$season['id'].'(\'uuuuunit2\')">'.HTML::encode($season['uuuuunit2']).'</td><td class="td_score" id="'.$season['id'].'ssssscore2" ondblclick="update_cell_s'.$season['id'].'(\'ssssscore2\')">'.$season['ssssscore2'].'</td></tr></table></td>';
            else $s['uuuuunit2'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuuuunit2" ondblclick="update_cell_u'.$season['id'].'(\'uuuuunit2\')">'.HTML::encode($season['uuuuunit2']).'</td><td class="td_score" id="'.$season['id'].'ssssscore2" ondblclick="update_cell_s'.$season['id'].'(\'ssssscore2\')"></td></tr></table></td>';
            $s['unit_winner'] = '<td class="td_unit">'.$season['unit_winner'].'</td>';

            if(trim($season['unit3place1'])!=null) $s['unit3place1'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'unit3place1" ondblclick="update_cell_u'.$season['id'].'(\'unit3place1\')">'.HTML::encode($season['unit3place1']).'</td><td class="td_score" id="'.$season['id'].'score3place1" ondblclick="update_cell_s'.$season['id'].'(\'score3place1\')">'.$season['score3place1'].'</td></tr></table></td>';
            else $s['unit3place1'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'unit3place1" ondblclick="update_cell_u'.$season['id'].'(\'unit3place1\')">'.HTML::encode($season['unit3place1']).'</td><td class="td_score" id="'.$season['id'].'score3place1" ondblclick="update_cell_s'.$season['id'].'(\'score3place1\')"></td></tr></table></td>';
            if(trim($season['unit3place2'])!=null) $s['unit3place2'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'unit3place2" ondblclick="update_cell_u'.$season['id'].'(\'unit3place2\')">'.HTML::encode($season['unit3place2']).'</td><td class="td_score" id="'.$season['id'].'score3place2" ondblclick="update_cell_s'.$season['id'].'(\'score3place2\')">'.$season['score3place2'].'</td></tr></table></td>';
            else $s['unit3place2'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'unit3place2" ondblclick="update_cell_u'.$season['id'].'(\'unit3place2\')">'.HTML::encode($season['unit3place2']).'</td><td class="td_score" id="'.$season['id'].'score3place2" ondblclick="update_cell_s'.$season['id'].'(\'score3place2\')"></td></tr></table></td>';
            $s['unit3place3'] = '<td class="td_unit">'.$season['unit3place3'].'</td>';
        }

        ////////// SCORE //////////////////////////////////////////////

        if(Season::nets()[$season['net_type']]['type']==2){

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

            for($i=1; $i<=32; $i++){
                $s['score'.$i] = '<td class="td_score" id="'.$season['id'].'score'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'score'.$i.'\')">'.$season['score'.$i].'</td>';
            }

            for($i=1; $i<=16; $i++){
                $s['sscore'.$i] = '<td class="td_score" id="'.$season['id'].'sscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'sscore'.$i.'\')">'.$season['sscore'.$i].'</td>';
            }

            for($i=1; $i<=8; $i++){
                $s['ssscore'.$i] = '<td class="td_score" id="'.$season['id'].'ssscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'ssscore'.$i.'\')">'.$season['ssscore'.$i].'</td>';
            }

            for($i=1; $i<=4; $i++){
                $s['sssscore'.$i] = '<td class="td_score" id="'.$season['id'].'sssscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'sssscore'.$i.'\')">'.$season['ssscore'.$i].'</td>';
            }
        }



        /////////// T I M E //////////////////////////////////////////////
        for($i=1; $i<=16; $i++){
            $s['time'.$i] = '<td class="td_time" id="'.$season['id'].'time'.$i.'" ondblclick="update_cell_t'.$season['id'].'(\'time'.$i.'\')">'.HTML::encode($season['time'.$i]).'</td>';
        }
        for($i=1; $i<=8; $i++){
            $s['ttime'.$i] = '<td class="td_time" id="'.$season['id'].'ttime'.$i.'" ondblclick="update_cell_t'.$season['id'].'(\'ttime'.$i.'\')">'.HTML::encode($season['ttime'.$i]).'</td>';
        }
        for($i=1; $i<=4; $i++){
            $s['tttime'.$i] = '<td class="td_time" id="'.$season['id'].'tttime'.$i.'" ondblclick="update_cell_t'.$season['id'].'(\'tttime'.$i.'\')">'.HTML::encode($season['tttime'.$i]).'</td>';
        }
        $s['ttttime1'] = '<td class="td_time" id="'.$season['id'].'ttttime1" ondblclick="update_cell_t'.$season['id'].'(\'ttttime1\')">'.HTML::encode($season['ttttime1']).'</td>';
        $s['ttttime2'] = '<td class="td_time" id="'.$season['id'].'ttttime2" ondblclick="update_cell_t'.$season['id'].'(\'ttttime2\')">'.HTML::encode($season['ttttime2']).'</td>';
        $s['time_final'] = '<td class="td_time" id="'.$season['id'].'time_final" ondblclick="update_cell_t'.$season['id'].'(\'time_final\')">'.HTML::encode($season['time_final']).'</td>';
        $s['time3place'] = '<td class="td_time" id="'.$season['id'].'time3place" ondblclick="update_cell_t'.$season['id'].'(\'time3place\')">'.HTML::encode($season['time3place']).'</td>';



        /////////////////////////  подключаемая сетка турнира  ///////////////////
        echo $this->render('nets/_net'.$season['net_type'], ['l'=>$l, 's'=>$s,]); ?>

    </div>



    <script>
        /// JS повторяется для каждой сетки /// Д Е Р Е В О

        <?php //проверка на тип сетки, Для каждого типа сетки должен изменяться свои ячейки
        if (Season::nets()[$season['net_type']]['type'] == 1){ ?>

        // ---------- функция для изменения ячеек ----------------------
        function update_cell_u<?php echo $season['id']; ?>(cell){
            <?php if($season['admin_id']==Yii::$app->user->id){ ?>
            var msgOld = $('#<?php echo $season['id']; ?>'+cell).text();
            var msg = prompt('Имя участника (не более 12 символов) изменить на...', msgOld);
            if(msg!=null){
                msg = msg.toString().substr(0, 12);
                //alert(msg);
                $.ajax({
                    type: "GET",
                    url: "<?php echo \Yii::$app->urlManager->createUrl(['t/ajaxupdatecell']) ?>/<?php echo $season['id']; ?>",
                    data: "cell="+cell+"&msg="+msg,
                    success: function(data){
                        //alert(data);
                        $('#<?php echo $season['id']; ?>'+cell).html(data);
                        socket.emit('unit', data, <?php echo $season['id']; ?>, cell);
                    }
                })
            }
            <?php } ?>
        }


        function update_cell_t<?php echo $season['id']; ?>(cell){
            <?php if($season['admin_id']==Yii::$app->user->id){ ?>
            var msgOld = $('#<?php echo $season['id']; ?>'+cell).text();
            var msg = prompt('Доп. информация (не более 16 символов) изменить на...', msgOld);
            if(msg!=null){
                msg = msg.toString().substr(0, 16);
                //alert(msg);
                $.ajax({
                    type: "GET",
                    url: "<?php echo \Yii::$app->urlManager->createUrl(['t/ajaxupdatecell']) ?>/<?php echo $season['id']; ?>",
                    data: "cell="+cell+"&msg="+msg,
                    success: function(data){
                        //alert(data);
                        $('#<?php echo $season['id']; ?>'+cell).html(data);
                        socket.emit('unit', data, <?php echo $season['id']; ?>, cell);
                    }
                })
            }
            <?php } ?>
        }


        function update_cell_s<?php echo $season['id']; ?>(cell){
            <?php if($season['admin_id']==Yii::$app->user->id){ ?>
            var msgOld = $('#<?php echo $season['id']; ?>'+cell).text();
            var msg = prompt('Баллы (не более 3 символов) изменить на...', msgOld);
            if(msg!=null){
                msg = msg.toString().substr(0, 3);
                //alert(msg);
                $.ajax({
                    type: "GET",
                    url: "<?php echo \Yii::$app->urlManager->createUrl(['t/ajaxupdatecell']) ?>/<?php echo $season['id']; ?>",
                    data: "cell="+cell+"&msg="+msg,
                    success: function(data){
                        //alert(data);
                        $('#<?php echo $season['id']; ?>'+cell).html(data);
                        socket.emit('unit', data, <?php echo $season['id']; ?>, cell);
                    }
                })
            }
            <?php } ?>
        }
        <?php } ?>


        <?php // проверка на тип сетки // Г Р У П П А

        if (Season::nets()[$season['net_type']]['type'] == 2){ ?>

        // ---------- функция для изменения ячеек ЮНИТЫ----------------------
        function update_cell_u<?php echo $season['id']; ?>(cell){
            <?php if($season['admin_id']==Yii::$app->user->id){ ?>
            var msgOld = $('#<?php echo $season['id']; ?>'+cell).text();
            var msg = prompt('Имя участника (не более 12 символов) изменить на...', msgOld);
            if(msg!=null){
                msg = msg.toString().substr(0, 12);
                //alert(cell);exit;
                $.ajax({
                    type: "GET",
                    url: "<?php echo \Yii::$app->urlManager->createUrl(['t/ajaxupdatecell']) ?>/<?php echo $season['id']; ?>",
                    data: "cell="+cell+"&msg="+msg,
                    success: function(data){
                        //alert(data);
                        $('#<?php echo $season['id']; ?>'+cell).html(data);
                        socket.emit('unit', data, <?php echo $season['id']; ?>, cell);
                        socket.emit('unit', data, <?php echo $season['id']; ?>, cell + '_1');
                        socket.emit('unit', data, <?php echo $season['id']; ?>, cell + '_2');
                        socket.emit('unit', data, <?php echo $season['id']; ?>, cell + '_3');
                    }
                })
            }
            <?php } ?>
        }


        // ---------- функция для изменения ячеек ВРЕМЯ----------------------
        function update_cell_t<?php echo $season['id']; ?>(cell){
            <?php if($season['admin_id']==Yii::$app->user->id){ ?>
            var msgOld = $('#<?php echo $season['id']; ?>'+cell).text();
            var msg = prompt('Доп. информация (не более 16 символов) изменить на...', msgOld);
            if(msg!=null){
                msg = msg.toString().substr(0, 16);
                //alert(msg);
                $.ajax({
                    type: "GET",
                    url: "<?php echo \Yii::$app->urlManager->createUrl(['t/ajaxupdatecell']) ?>/<?php echo $season['id']; ?>",
                    data: "cell="+cell+"&msg="+msg,
                    success: function(data){
                        //alert(data);
                        $('#<?php echo $season['id']; ?>'+cell).html(data);
                        socket.emit('unit', data, <?php echo $season['id']; ?>, cell);
                    }
                })
            }
            <?php } ?>
        }


        // ---------- функция для изменения ячеек ОЧКИ ----------------------
        function update_cell_s<?php echo $season['id']; ?>(cell){
            <?php if($season['admin_id'] == Yii::$app->user->id){ ?>
            var msgOld = $('#<?php echo $season['id']; ?>'+cell).text();
            var msg = prompt('Баллы (не более 3 символов) изменить на...', msgOld);
            if(msg != null){
                msg = msg.toString().substr(0, 3);
                //alert(msg);
                $.ajax({
                    type: "GET",
                    url: "<?php echo \Yii::$app->urlManager->createUrl(['t/ajaxupdatecell']) ?>/<?php echo $season['id']; ?>",
                    data: "cell="+cell+"&msg="+msg,
                    success: function(data){
                        //alert(data);
                        $('#<?php echo $season['id']; ?>'+cell).html(data);
                        socket.emit('unit', data, <?php echo $season['id']; ?>, cell);
                        var cell_2 = getScoreCellFromHeadTable(cell,<?php echo $season['id']; ?>, msg);
                        socket.emit('unit', data, <?php echo $season['id']; ?>, cell_2);
                    }
                });
            }
            <?php } ?>
        }
        <?php } ?>
    </script>

<?php } ?>

<?php
    if ($t['admin_id'] == Yii::$app->user->id) {
        if($seasons == null){ ?>
            <p style = 'color: red; text-align: right;' >Турнирные сетки не найдены! Нажмите <strong>(+) ДОБАВИТЬ НОВУЮ ТУРНИРНУЮ СЕТКУ</strong></p>
        <?php
        } else {
        ?>
            <p class="grey" style="text-align: right;">
                Вы Админ и можете править ячейки "Участники" и "Время" два раза кликнув на них мышью.
            </p>
<?php   }
    } else echo '<p><br /></p>' ?>

</div>



<!-- ----------- M S G S  сообщения от пользователей ----------- -->

<table class="tbl_head_msgs">
    <tr>
        <th>Сообщения от пользователей</th>
        <td>Всего: <?php echo count($msgs); ?></td>
    </tr>
</table>
<table style="width: 100%">
    <tr>
        <td style="width: 60%; padding: 10px; border: 2px solid #39b3d7; vertical-align: top;">
            <table id="msgs" class="tbl_msgs">
                <?php foreach($msgs as $one){ ?>
                    <tr>
                        <th><?php echo User::name($one['admin_id']) ?><br/><span style="font-size: xx-small; color: #c0c0c0;">(<?php echo date('d.m.y', $one['time']) ?>)</th>
                        <td><?php echo nl2br(HTML::encode($one['text'])) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </td>
        <td style="width: 40%; padding: 10px; vertical-align: top;">
            <div>
                <textarea id="text_msg" placeholder="Введите новое сообщение... <?php if(Yii::$app->user->isGuest) echo '(Вы гость, поэтому сообщение не сохраниться...)'; ?>" rows="3" style="width: 99%"></textarea><br />
                <button onclick="enter_msg()" style="width: 100%; text-align: center;"> Отправить сообщение</button>
            </div>
        </td>
    </tr>
</table>


<script src='http://5.63.152.110:1984/socket.io/socket.io.js'></script>
<script> var socket = io.connect('http://5.63.152.110:1984');


    ////////////////////////////         AUTOLOAD      ///////////////////////////
    window.onload = function(){

        ////////////    трансляциии     /////////////////////////
        // трансляция unit
        socket.on('brodcast_unit', function(data, id, cell){
            $('#'+id+cell).html(data);
            $('#time_update'+id).html(new Date().toLocaleString());
        });

        ////////////    трансляциии     /////////////////////////
        // трансляция сообщений в чат турнира
        socket.on('brodcast_chattournament<?php echo $t['id']; ?>', function(data){
            $('#msgs').prepend(data);
        });
    };

    function show_season(id){
        $('.s0').css('display','none');
        $('#s'+id).css('display','block');
    }


    function add_link(){
        $('#link').load("<?php echo \Yii::$app->urlManager->createUrl(['link/ajaxaddlinkt']) ?>/<?php echo $t['id']; ?>");
    }

    function notSendFromGroupCell(){
        alert('Ошибка! В этой ячейке имя участника автоматически подставляется ' +
            'во время редактирования верхней таблицы участников (в шапке сетки).');
    }

    function notSendFromGroupCellScore(){
        alert('Ошибка! В этой ячейке сумма баллоа автоматически подставляется ' +
            'во время редактирования баллов в нижних гпупповых таблицах.');
    }

    // Баллы в ячейках score в верхней таблице-шапки в Групповой
    function getScoreCellFromHeadTable(cell, season, data){
        if (cell == 'score1' || cell == 'score2' || cell == 'score3') {
            var sum = parseInt($('#' + season + 'score1').text()) +  parseInt($('#' + season + 'score2').text()) +  parseInt($('#' + season + 'score3').text());
            $('#' + season + 'score_a1').html(sum);
        }
        if (cell == 'score4' || cell == 'score5' || cell == 'score6') {
            var sum = parseInt($('#' + season + 'score4').text()) +  parseInt($('#' + season + 'score5').text()) +  parseInt($('#' + season + 'score6').text());
            $('#' + season + 'score_a2').html(sum);
        }
        if (cell == 'score7' || cell == 'score8' || cell == 'score9') {
            var sum = parseInt($('#' + season + 'score7').text()) +  parseInt($('#' + season + 'score8').text()) +  parseInt($('#' + season + 'score9').text());
            $('#' + season + 'score_a3').html(sum);
        }
        if (cell == 'score10' || cell == 'score11' || cell == 'score12') {
            var sum = parseInt($('#' + season + 'score10').text()) +  parseInt($('#' + season + 'score11').text()) +  parseInt($('#' + season + 'score12').text());
            $('#' + season + 'score_a4').html(sum);
        }
        if (cell == 'score13' || cell == 'score14' || cell == 'score15') {
            var sum = parseInt($('#' + season + 'score13').text()) +  parseInt($('#' + season + 'score14').text()) +  parseInt($('#' + season + 'score15').text());
            $('#' + season + 'score_b1').html(sum);
        }
        if (cell == 'score16' || cell == 'score17' || cell == 'score18') {
            var sum = parseInt($('#' + season + 'score16').text()) +  parseInt($('#' + season + 'score17').text()) +  parseInt($('#' + season + 'score18').text());
            $('#' + season + 'score_b2').html(sum);
        }
        if (cell == 'score19' || cell == 'score20' || cell == 'score21') {
            var sum = parseInt($('#' + season + 'score19').text()) +  parseInt($('#' + season + 'score20').text()) +  parseInt($('#' + season + 'score21').text());
            $('#' + season + 'score_b3').html(sum);
        }
        if (cell == 'score22' || cell == 'score23' || cell == 'score24') {
            var sum = parseInt($('#' + season + 'score22').text()) +  parseInt($('#' + season + 'score23').text()) +  parseInt($('#' + season + 'score24').text());
            $('#' + season + 'score_b4').html(sum);
        }
        if (cell == 'score25' || cell == 'score26' || cell == 'score27') {
            var sum = parseInt($('#' + season + 'score25').text()) +  parseInt($('#' + season + 'score26').text()) +  parseInt($('#' + season + 'score27').text());
            $('#' + season + 'score_c1').html(sum);
        }
        if (cell == 'score28' || cell == 'score29' || cell == 'score30') {
            var sum = parseInt($('#' + season + 'score28').text()) +  parseInt($('#' + season + 'score29').text()) +  parseInt($('#' + season + 'score30').text());
            $('#' + season + 'score_c2').html(sum);
        }
        if (cell == 'score31' || cell == 'score32' || cell == 'sscore1') {
            var sum = parseInt($('#' + season + 'score31').text()) +  parseInt($('#' + season + 'score32').text()) +  parseInt($('#' + season + 'sscore1').text());
            $('#' + season + 'score_c3').html(sum);
        }
        if (cell == 'sscore2' || cell == 'sscore3' || cell == 'sscore4') {
            var sum = parseInt($('#' + season + 'sscore2').text()) +  parseInt($('#' + season + 'sscore3').text()) +  parseInt($('#' + season + 'sscore4').text());
            $('#' + season + 'score_c4').html(sum);
        }
        if (cell == 'sscore5' || cell == 'sscore6' || cell == 'sscore7') {
            var sum = parseInt($('#' + season + 'sscore5').text()) +  parseInt($('#' + season + 'sscore6').text()) +  parseInt($('#' + season + 'sscore7').text());
            $('#' + season + 'score_d1').html(sum);
        }
        if (cell == 'sscore8' || cell == 'sscore9' || cell == 'sscore10') {
            var sum = parseInt($('#' + season + 'sscore8').text()) +  parseInt($('#' + season + 'sscore9').text()) +  parseInt($('#' + season + 'sscore10').text());
            $('#' + season + 'score_d2').html(sum);
        }
        if (cell == 'sscore11' || cell == 'sscore12' || cell == 'sscore13') {
            var sum = parseInt($('#' + season + 'sscore11').text()) +  parseInt($('#' + season + 'sscore12').text()) +  parseInt($('#' + season + 'sscore13').text());
            $('#' + season + 'score_d3').html(sum);
        }
        if (cell == 'sscore14' || cell == 'sscore15' || cell == 'sscore16') {
            var sum = parseInt($('#' + season + 'sscore14').text()) +  parseInt($('#' + season + 'sscore15').text()) +  parseInt($('#' + season + 'sscore16').text());
            $('#' + season + 'score_d4').html(sum);
        }
        if (cell == 'ssscore1' || cell == 'ssscore2' || cell == 'ssscore3') {
            var sum = parseInt($('#' + season + 'ssscore1').text()) +  parseInt($('#' + season + 'ssscore2').text()) +  parseInt($('#' + season + 'ssscore3').text());
            $('#' + season + 'score_f1').html(sum);
        }
        if (cell == 'ssscore4' || cell == 'ssscore5' || cell == 'ssscore6') {
            var sum = parseInt($('#' + season + 'ssscore4').text()) +  parseInt($('#' + season + 'ssscore5').text()) +  parseInt($('#' + season + 'ssscore6').text());
            $('#' + season + 'score_f2').html(sum);
        }
        if (cell == 'ssscore7' || cell == 'ssscore8' || cell == 'sssscore1') {
            var sum = parseInt($('#' + season + 'ssscore7').text()) +  parseInt($('#' + season + 'ssscore8').text()) +  parseInt($('#' + season + 'sssscore1').text());
            $('#' + season + 'score_f3').html(sum);
        }
        if (cell == 'sssscore2' || cell == 'sssscore3' || cell == 'sssscore4') {
            var sum = parseInt($('#' + season + 'sssscore2').text()) +  parseInt($('#' + season + 'sssscore3').text()) +  parseInt($('#' + season + 'sssscore4').text());
            $('#' + season + 'score_f4').html(sum);
        }

        //return cell2
    }


    function enter_msg(){
        var text = $('#text_msg').val();
        $.ajax({
            type: "GET",
            url: '<?php echo \Yii::$app->urlManager->createUrl(['msgs/ajaxentermsg']); ?>/<?php echo $t['id'] ?>',
            data: "text="+text,
            success: function(data){
                //alert(data);
                //$('#msgs').prepend(data);
                socket.emit('enter_chattournament', data, <?php echo $t['id']; ?>);
            }
        });
        $('#text_msg').val('');
    }
</script>