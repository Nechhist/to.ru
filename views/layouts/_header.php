<?php
use app\models\User;
use app\models\T;
use app\models\Link;

//////////////////// USER //////////////////////
$count_links = 0;
if(!Yii::$app->user->isGuest){
$my_t = T::find()->where(['admin_id'=>Yii::$app->user->id])->count();
$my_link = Link::find()->where(['admin_id'=>Yii::$app->user->id])->count();
$count_links = $my_link + $my_t;
}
?>
<style>
    .header-table-small td{
        border: 1px solid <?=Yii::$app->params['color']['table_bg_dark']?>;
        margin: 0;
        padding: 3px 15px;
        background-color: <?=Yii::$app->params['color']['table_bg_dark']?>;
        color: #ffffff;
        font-weight: bold;
        font-size: 16px;
    }

    .header-table-small td:hover{
        cursor: pointer;
        background-color: <?=Yii::$app->params['color']['bg']?>;
        color: <?=Yii::$app->params['color']['table_bg_dark']?>;
    }
</style>


<!-- МЕНЮ -->
<div class="header">
    <!--  большая таблица-->
    <table style="width: 100%;">
        <tr>
            <td style="padding: 0 10px 0 10px; margin: 0; background-color: <?=Yii::$app->params['color']['bg']?>">
                <img style="cursor: pointer; height: 25px;" onclick="link('site/index')" src="<?php echo Yii::$app->request->baseUrl; ?>/images/logo_30.png" alt="Турниры Online лого">
            </td>
            <td style="vertical-align: top; width: 100%; background-color: <?=Yii::$app->params['color']['table_bg_dark']?>">
                <!-- Ссылки -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xm-12" style="text-align: left">
                        <!-- таблица левого меню -->
                        <table class="header-table-small">
                            <td onclick="link('site/index')">Главная</td>
                            <td onclick="link('t')">Турниры</td>
                            <td onclick="link('t/create')"><strong>+</strong></td>
                            <!-- <td onclick="link('user/index')">Пользователи</td> -->
                        </table>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xm-12" style="align-items: right">
                        <!-- таблица правого меню -->
                        <table class="header-table-small" align="right">
                            <th style="border: 1px solid <?=Yii::$app->params['color']['table_bg_dark']?>; cursor: default;background-color: <?=Yii::$app->params['color']['table_bg_dark']?>;"></th> <!-- пустая ячейка -->
                            <td onclick="link('link')"><span id="count_links"><?php echo $count_links; ?></span></td>
                            <?php if(!Yii::$app->user->isGuest){ ?>
                                <td class="header_td_link" onclick="alert('Раздел НАСТРОЙКИ ПОЛЬЗОВАТЕЛЯ врененно в разработке')"><?php echo User::name(Yii::$app->user->id); ?></td>
                                <td class="header_td_link" onclick="link('site/logout')">Выход</td>
                            <?php }else{ ?>
                                <td class="header_td_link" onclick="link('site/signup')">Регистрация</td>
                                <td class="header_td_link" onclick="link('site/login')">Вход</td>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>