<?php
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

$this->title = Html::encode($t['name']).' | '.Html::encode($season['name']);
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


<table style="width: 100%; background-color: #e38d13; padding-left: 5px; text-align: center; margin-bottom: 20px; margin-top: 20px;">
    <tr>
        <td style="text-align: left;">
                    <span style="font-size: x-large; font-weight: bold;">
                        <span style="cursor: pointer;" onclick="document.location.href = '<?php echo \Yii::$app->urlManager->createUrl(['t/view']) ?>/<?php echo $season['t_id']; ?>';">
                            <?php echo Html::encode($t['name']) ?>
                        </span>
                        |
                        <?php echo Html::encode($season['name']) ?>
                        <?php if(trim($season['time_action'])!=null) echo '('.$season['time_action'].')'; ?>
                    </span>
        </td>
        <td style="text-align: right;">
                    <span style="color: white; font-size: large; font-weight: bold;">
                        <?php
                        echo Season::nets(3, $season['net_type']);
                        echo ' участников';
                        //if($season['unit_type']==0) echo 'участников';
                        //if($season['unit_type']==1) echo 'игроков';
                        //if($season['unit_type']==2) echo 'команд';
                        ?>
                        (изменено: <?php echo date('d.m.Y в H:i', $season['time_update']); ?>)
                        <?php if($t->admin_id==Yii::$app->user->id) echo '<a href="'.Yii::$app->urlManager->createUrl(['t/updateseason', 'id'=>$season['id']]).'">изменить сезон</a>'; ?>
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

$s = []; // аррай сезона

/////////// U N I T /////////////////////////////////////////////////////
// ----------------------------------------------------------------------
if($season['score_open']==0){
    for($i=1; $i<=32; $i++){
        $s['unit'.$i] = '<td class="td_unit" id="'.$season['id'].'unit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'unit'.$i.'\')">'.$season['unit'.$i].'</td>';
    }
    for($i=1; $i<=16; $i++){
        $s['uunit'.$i] = '<td class="td_unit" id="'.$season['id'].'uunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uunit'.$i.'\')">'.$season['uunit'.$i].'</td>';
    }
    for($i=1; $i<=8; $i++){
        $s['uuunit'.$i] = '<td class="td_unit" id="'.$season['id'].'uuunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uuunit'.$i.'\')">'.$season['uuunit'.$i].'</td>';
    }
    for($i=1; $i<=4; $i++){
        $s['uuuunit'.$i] = '<td class="td_unit" id="'.$season['id'].'uuuunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uuuunit'.$i.'\')">'.$season['uuuunit'.$i].'</td>';
    }
    $s['uuuuunit1'] = '<td class="td_unit" id="'.$season['id'].'uuuuunit1" ondblclick="update_cell_u'.$season['id'].'(\'uuuuunit1\')">'.$season['uuuuunit1'].'</td>';
    $s['uuuuunit2'] = '<td class="td_unit" id="'.$season['id'].'uuuuunit2" ondblclick="update_cell_u'.$season['id'].'(\'uuuuunit2\')">'.$season['uuuuunit2'].'</td>';
    $s['unit_winner'] = '<td class="td_unit" id="'.$season['id'].'unit_winner" ondblclick="update_cell_u'.$season['id'].'(\'unit_winner\')">'.$season['unit_winner'].'</td>';

    $s['unit3place1'] = '<td class="td_unit" id="'.$season['id'].'unit3place1" ondblclick="update_cell_u'.$season['id'].'(\'unit3place1\')">'.$season['unit3place1'].'</td>';
    $s['unit3place2'] = '<td class="td_unit" id="'.$season['id'].'unit3place2" ondblclick="update_cell_u'.$season['id'].'(\'unit3place2\')">'.$season['unit3place2'].'</td>';
    $s['unit3place3'] = '<td class="td_unit" id="'.$season['id'].'unit3place3" ondblclick="update_cell_u'.$season['id'].'(\'unit3place3\')">'.$season['unit3place3'].'</td>';
}

if($season['score_open']==1){
    for($i=1; $i<=32; $i++){
        if(trim($season['unit'.$i]!=null)) $s['unit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'unit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'unit'.$i.'\')">'.$season['unit'.$i].'</td><td class="td_score" id="'.$season['id'].'score'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'score'.$i.'\')">'.$season['score'.$i].'</td></tr></table></td>';
        else $s['unit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'unit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'unit'.$i.'\')">'.$season['unit'.$i].'</td><td class="td_score" id="'.$season['id'].'score'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'score'.$i.'\')"></td></tr></table></td>';
    }
    for($i=1; $i<=16; $i++){
        if(trim($season['uunit'.$i])!=null) $s['uunit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uunit'.$i.'\')">'.$season['uunit'.$i].'</td><td class="td_score" id="'.$season['id'].'sscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'sscore'.$i.'\')">'.$season['sscore'.$i].'</td></tr></table></td>';
        else $s['uunit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uunit'.$i.'\')">'.$season['uunit'.$i].'</td><td class="td_score" id="'.$season['id'].'sscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'sscore'.$i.'\')"></td></tr></table></td>';
    }
    for($i=1; $i<=8; $i++){
        if(trim($season['uuunit'.$i])!=null) $s['uuunit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uuunit'.$i.'\')">'.$season['uuunit'.$i].'</td><td class="td_score" id="'.$season['id'].'ssscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'ssscore'.$i.'\')">'.$season['ssscore'.$i].'</td></tr></table></td>';
        else $s['uuunit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uuunit'.$i.'\')">'.$season['uuunit'.$i].'</td><td class="td_score" id="'.$season['id'].'ssscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'ssscore'.$i.'\')"></td></tr></table></td>';
    }
    for($i=1; $i<=4; $i++){
        if(trim($season['uuuunit'.$i])!=null) $s['uuuunit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuuunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uuuunit'.$i.'\')">'.$season['uuuunit'.$i].'</td><td class="td_score" id="'.$season['id'].'sssscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'sssscore'.$i.'\')">'.$season['sssscore'.$i].'</td></tr></table></td>';
        else $s['uuuunit'.$i] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuuunit'.$i.'" ondblclick="update_cell_u'.$season['id'].'(\'uuuunit'.$i.'\')">'.$season['uuuunit'.$i].'</td><td class="td_score" id="'.$season['id'].'sssscore'.$i.'" ondblclick="update_cell_s'.$season['id'].'(\'sssscore'.$i.'\')"></td></tr></table></td>';
    }
    if(trim($season['uuuuunit1'])!=null) $s['uuuuunit1'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuuuunit1" ondblclick="update_cell_u'.$season['id'].'(\'uuuuunit1\')">'.$season['uuuuunit1'].'</td><td class="td_score" id="'.$season['id'].'ssssscore1" ondblclick="update_cell_s'.$season['id'].'(\'ssssscore1\')">'.$season['ssssscore1'].'</td></tr></table></td>';
    else $s['uuuuunit1'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuuuunit1" ondblclick="update_cell_u'.$season['id'].'(\'uuuuunit1\')">'.$season['uuuuunit1'].'</td><td class="td_score" id="'.$season['id'].'ssssscore1" ondblclick="update_cell_s'.$season['id'].'(\'ssssscore1\')"></td></tr></table></td>';
    if(trim($season['uuuuunit2'])!=null) $s['uuuuunit2'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuuuunit2" ondblclick="update_cell_u'.$season['id'].'(\'uuuuunit2\')">'.$season['uuuuunit2'].'</td><td class="td_score" id="'.$season['id'].'ssssscore2" ondblclick="update_cell_s'.$season['id'].'(\'ssssscore2\')">'.$season['ssssscore2'].'</td></tr></table></td>';
    else $s['uuuuunit2'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'uuuuunit2" ondblclick="update_cell_u'.$season['id'].'(\'uuuuunit2\')">'.$season['uuuuunit2'].'</td><td class="td_score" id="'.$season['id'].'ssssscore2" ondblclick="update_cell_s'.$season['id'].'(\'ssssscore2\')"></td></tr></table></td>';
    $s['unit_winner'] = '<td class="td_unit">'.$season['unit_winner'].'</td>';

    if(trim($season['unit3place1'])!=null) $s['unit3place1'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'unit3place1" ondblclick="update_cell_u'.$season['id'].'(\'unit3place1\')">'.$season['unit3place1'].'</td><td class="td_score" id="'.$season['id'].'score3place1" ondblclick="update_cell_s'.$season['id'].'(\'score3place1\')">'.$season['score3place1'].'</td></tr></table></td>';
    else $s['unit3place1'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'unit3place1" ondblclick="update_cell_u'.$season['id'].'(\'unit3place1\')">'.$season['unit3place1'].'</td><td class="td_score" id="'.$season['id'].'score3place1" ondblclick="update_cell_s'.$season['id'].'(\'score3place1\')"></td></tr></table></td>';
    if(trim($season['unit3place2'])!=null) $s['unit3place2'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'unit3place2" ondblclick="update_cell_u'.$season['id'].'(\'unit3place2\')">'.$season['unit3place2'].'</td><td class="td_score" id="'.$season['id'].'score3place2" ondblclick="update_cell_s'.$season['id'].'(\'score3place2\')">'.$season['score3place2'].'</td></tr></table></td>';
    else $s['unit3place2'] = '<td class="td_unit"><table><tr><td class="td_unit0" id="'.$season['id'].'unit3place2" ondblclick="update_cell_u'.$season['id'].'(\'unit3place2\')">'.$season['unit3place2'].'</td><td class="td_score" id="'.$season['id'].'score3place2" ondblclick="update_cell_s'.$season['id'].'(\'score3place2\')"></td></tr></table></td>';
    $s['unit3place3'] = '<td class="td_unit">'.$season['unit3place3'].'</td>';
}



/////////// T I M E //////////////////////////////////////////////
for($i=1; $i<=16; $i++){
    $s['time'.$i] = '<td class="td_time" id="'.$season['id'].'time'.$i.'" ondblclick="update_cell_t'.$season['id'].'(\'time'.$i.'\')">'.$season['time'.$i].'</td>';
}
for($i=1; $i<=8; $i++){
    $s['ttime'.$i] = '<td class="td_time" id="'.$season['id'].'ttime'.$i.'" ondblclick="update_cell_t'.$season['id'].'(\'ttime'.$i.'\')">'.$season['ttime'.$i].'</td>';
}
for($i=1; $i<=4; $i++){
    $s['tttime'.$i] = '<td class="td_time" id="'.$season['id'].'tttime'.$i.'" ondblclick="update_cell_t'.$season['id'].'(\'tttime'.$i.'\')">'.$season['tttime'.$i].'</td>';
}
$s['ttttime1'] = '<td class="td_time" id="'.$season['id'].'ttttime1" ondblclick="update_cell_t'.$season['id'].'(\'ttttime1\')">'.$season['ttttime1'].'</td>';
$s['ttttime2'] = '<td class="td_time" id="'.$season['id'].'ttttime2" ondblclick="update_cell_t'.$season['id'].'(\'ttttime2\')">'.$season['ttttime2'].'</td>';
$s['time_final'] = '<td class="td_time" id="'.$season['id'].'time_final" ondblclick="update_cell_t'.$season['id'].'(\'time_final\')">'.$season['time_final'].'</td>';
$s['time3place'] = '<td class="td_time" id="'.$season['id'].'time3place" ondblclick="update_cell_t'.$season['id'].'(\'time3place\')">'.$season['time3place'].'</td>';



/////////////////////////  подключаемая сетка турнира  ///////////////////
echo $this->render('nets/_net'.$season['net_type'], ['l'=>$l, 's'=>$s,]); ?>
</div>


<script>
    // ---------- функция для изменения ячеек ----------------------
    function update_cell_u<?php echo $season['id']; ?>(cell){
        <?php if($season['admin_id']==Yii::$app->user->id){ ?>
        var msgOld = $('#<?php echo $season['id']; ?>'+cell).text();
        var msg = prompt('(не более 12 символов) Изменить на...', msgOld);
        if(msg!=null){
            $.ajax({
                type: "GET",
                url: "<?php echo \Yii::$app->urlManager->createUrl(['t/ajaxupdatecell']) ?>/<?php echo $season['id']; ?>",
                data: "cell="+cell+"&msg="+msg,
                success: function(data){
                    //alert(data);
                    $('#<?php echo $season['id']; ?>'+cell).html(data);
                }
            })
        }
        <?php } ?>
    }

    function update_cell_t<?php echo $season['id']; ?>(cell){
        <?php if($season['admin_id']==Yii::$app->user->id){ ?>
        var msgOld = $('#<?php echo $season['id']; ?>'+cell).text();
        var msg = prompt('(не более 20 символов) Изменить на...', msgOld);
        if(msg!=null){
            $.ajax({
                type: "GET",
                url: "<?php echo \Yii::$app->urlManager->createUrl(['t/ajaxupdatecell']) ?>/<?php echo $season['id']; ?>",
                data: "cell="+cell+"&msg="+msg,
                success: function(data){
                    //alert(data);
                    $('#<?php echo $season['id']; ?>'+cell).html(data);
                }
            })
        }
        <?php } ?>
    }

    function update_cell_s<?php echo $season['id']; ?>(cell){
        <?php if($season['admin_id']==Yii::$app->user->id){ ?>
        var msgOld = $('#<?php echo $season['id']; ?>'+cell).text();
        var msg = prompt('(не более 3 символов) Изменить на...', msgOld);
        if(msg!=null){
            $.ajax({
                type: "GET",
                url: "<?php echo \Yii::$app->urlManager->createUrl(['t/ajaxupdatecell']) ?>/<?php echo $season['id']; ?>",
                data: "cell="+cell+"&msg="+msg,
                success: function(data){
                    //alert(data);
                    $('#<?php echo $season['id']; ?>'+cell).html(data);
                }
            })
        }
        <?php } ?>
    }
</script>
