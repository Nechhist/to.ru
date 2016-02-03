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
        height: 25px;
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
        padding: 2px;

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
</style>




<!------------------------- ВВОДНАЯ ИНФОРМАЦИЯ О ТУРНИРЕ ----------------------------->

<table class="t_tbl_info">
    <tr>
        <td style="width: 1px;">
            <img src="<?php echo $t['img']; ?>" style="height: 120px;">
        </td>
        <td style="padding: 5px 30px; text-align: center; width: 100px;">
            <span style="font-weight: bold; font-size: x-large"><?php echo HTML::encode($t['name']); ?></span>
            <br /><br />
            <span><?php if($t['game']!=null) echo '('.HTML::encode($t['game']).')'; ?></span>
        </td>
        <td>
            <table style="width: 100%">
                <tr>
                    <td>
                        <strong>Админ: </strong><span style="color: #666666"><?php echo User::name($t['admin_id']); ?></span>.
                        <?php if($t['site']!=null){ ?><strong>Сайт: </strong><a href="<?php echo $t['site']; ?>"><?php echo HTML::encode($t['site']); ?></a><?php } ?>
                    </td>
                    <td style="text-align: right;">
                        <?php
                        if(!Yii::$app->user->isGuest){
                            if($t->admin_id==Yii::$app->user->id){ ?>
                                <a href="<?php echo Yii::$app->urlManager->createUrl(['t/update', 'id'=>$t['id']]) ?>">Настройки турнира</a>
                            <?php }else{ ?>
                                <span id="link"><a onclick="add_link()" style="cursor: pointer;">добавить в "Избранные"</a></span>
                            <?php }
                        }?>
                    </td>
                </tr>
            </table>

            <span style="font-style: italic; "><?php echo HTML::encode($t['opisanie']); ?></span>

            <hr />
            <div>
                <table style="width: 100%;">
                    <tr>
                        <td style="text-align: left;">
                            <strong>Турнирные сетки:</strong>
                        </td>
                        <?php if($t->admin_id==Yii::$app->user->id){ ?>
                        <td style="text-align: right;">
                            <a href="<?php echo Yii::$app->urlManager->createUrl(['t/createseason']).'/'.$t['id']; ?>">
                                (+) добавить новую турнирную сетку
                            </a>
                        </td>
                        <?php } ?>
                    </tr>
                </table>

                <?php foreach(array_reverse($seasons) as $one){ ?>
                    <a style="cursor: pointer;" onclick="show_season(<?php echo $one['id']; ?>)"><?php echo HTML::encode($one['name']); ?></a>;
                <?php } ?>

            </div>
        </td>
    </tr>
</table>





<div style="min-height: 350px;">
<?php ///////////////////       Ц И К Л   С Е З О Н О В      ///////////////////


$counter = 1; // счетчик сезонов
foreach($seasons as $season){
    $display = 'none';
    if($counter == count($seasons)) $display = 'block';
    $counter++;
    ?>

    <div style="display: <?php echo $display; ?>;" class="s0" id="s<?php echo $season['id']; ?>">



        <!------------------ шапка-полоса сезона ----------------->
        <table style="width: 100%; background-color: #e38d13; text-align: center; margin-bottom: 20px; margin-top: 20px; font-size: x-large; font-weight: bold;">
            <tr>
                <td style="text-align: left; padding-left: 5px;">
                    <span style="">
                        <span style="cursor: pointer; " onclick="document.location.href = '<?php echo \Yii::$app->urlManager->createUrl(['t/season']) ?>/<?php echo $season['id']; ?>';">
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


        if(Season::nets()[$season['net_type']]['type']==2){
            for($i=1; $i<=32; $i++){
                $s['score'.$i] = $season['score'.$i];
            }

            for($i=1; $i<=16; $i++){
                $s['sscore'.$i] = $season['sscore'.$i];
            }

            for($i=1; $i<=8; $i++){
                $s['ssscore'.$i] = $season['ssscore'.$i];
            }

            for($i=1; $i<=4; $i++){
                $s['sssscore'.$i] = $season['sssscore'.$i];
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
        echo $this->render('_net'.$season['net_type'], ['l'=>$l, 's'=>$s,]); ?>
    </div>



    <script>

        // ---------- функция для изменения ячеек ----------------------
        function update_cell_u<?php echo $season['id']; ?>(cell){
            <?php if($season['admin_id']==Yii::$app->user->id){ ?>
            var msgOld = $('#<?php echo $season['id']; ?>'+cell).text();
            var msg = prompt('(не более 12 символов) Изменить на...', msgOld);
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
            var msg = prompt('(не более 16 символов) Изменить на...', msgOld);
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
            var msg = prompt('(не более 3 символов) Изменить на...', msgOld);
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
    </script>

<?php } ?>

<?php if($t['admin_id']==Yii::$app->user->id){
        if($seasons==null){ ?>
            <p style = 'color: red; text-align: right;' >Турнирные сетки не найдены! Нажмите <strong>(+) ДОБАВИТЬ НОВУЮ ТУРНИРНУЮ СЕТКУ</strong></p>
        <?php }else{ ?>
            <p class="grey" style="text-align: right;">
                Вы Админ и можете править ячейки "Участники" и "Время" два раза кликнув на них мышью.
            </p>
<?php } }else echo '<p><br /></p>' ?>

</div>





<!-- ----------- M S G S  сообщения от пользователей ----------- -->
<style>
    .tbl_head_msgs{
        background-color: #39b3d7;
        width: 100%
    }

    .tbl_head_msgs th{
        font-size: larger;
        text-align: left;
        padding: 3px;
    }

    .tbl_head_msgs td{
        font-size: large;
        color: #666666;
        text-align: right;
        padding: 3px;
    }

    .tbl_msgs{
        width: 100%;
    }

    .tbl_msgs th{
        padding: 5px;
        margin: 5px;
        border: 2px solid #c0c0c0;
        text-align: center;
        width: 1px;
        vertical-align: top;
    }

    .tbl_msgs td{
        padding: 5px;
        margin: 5px;
        border: 2px solid #c0c0c0;
        text-align: left;
        vertical-align: top;
    }
</style>



<div>
    <table class="tbl_head_msgs">
        <tr>
            <th>Сообщения от пользователей</th>
            <td>Всего: <?php echo count($msgs); ?></td>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td style="width: 50%; padding: 10px; border: 2px solid #39b3d7; vertical-align: top;">
                <table id="msgs" class="tbl_msgs">
                    <?php foreach($msgs as $one){ ?>
                        <tr>
                            <th><?php echo User::name($one['admin_id']) ?><br/><span style="font-size: xx-small; color: #c0c0c0;">(<?php echo date('d.m.y', $one['time']) ?>)</th>
                            <td><?php echo nl2br(HTML::encode($one['text'])) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </td>
            <td style="width: 50%; padding: 10px; vertical-align: top;">
                <div>
                    <textarea id="text_msg" placeholder="Введите новое сообщение... <?php if(Yii::$app->user->isGuest) echo '(Вы гость, поэтому сообщение не сохраниться...)'; ?>" rows="3" style="width: 99%"></textarea><br />
                    <button onclick="enter_msg()" style="width: 100%; text-align: center;"> Отправить сообщение</button>
                </div>
            </td>
        </tr>
    </table>
</div>


<script src='http://5.63.152.110:1984/socket.io/socket.io.js'></script>
<script> var socket = io.connect('http://5.63.152.110:1984');


    ////////////////////////////         AVTOLOAD      ///////////////////////////
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