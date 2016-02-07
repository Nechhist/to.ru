<?php
    use yii\helpers\Html;
    use app\models\User;
?>

<!------------------------- ВВОДНАЯ ИНФОРМАЦИЯ О ТУРНИРЕ ----------------------------->


<table class="t_tbl_info">
    <tr>

        <!-- Лого турнира -->
        <td style="width: 1px;">
            <img src="<?php echo $t['img']; ?>" style="height: 120px;">
        </td>

        <!-- Название турнира - Игра -->
        <td style="padding: 5px 30px; text-align: center; width: 200px;">
            <span style="font-weight: bold; font-size: x-large"><?php echo HTML::encode($t['name']); ?></span>
            <br /><br />
            <span><?php if($t['game']!=null) echo '('.HTML::encode($t['game']).')'; ?></span>
        </td>
        <td>

            <!-- Админ - Сайт - Избранное -->
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

            <!-- Описание турнира -->
            <div style="font-style: italic;"><?php echo HTML::encode($t['opisanie']); ?></div>

            <hr style="margin: 7px;" />

            <!-- Строка всех сезонов  -->
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
