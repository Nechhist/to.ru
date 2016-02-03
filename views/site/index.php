<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use app\models\Season;
use app\models\T;
use app\models\User;

$this->title = Yii::$app->name;
//var_dump($news); exit;
?>

<div class="container">
    <!-------- Н о в о с т и ------------------------------------------------------>
    <style>
        .main_news .div-header-news{
            font-weight: bolder;
        }
    </style>
    <div class="row main_news" style="font-size: smaller">
        <?php if (isset($news)) { ?>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xm-6 div-header-news">
                    Новость | <?php echo date('d.m.y', $news->time); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs" style="text-align: right">
                    <a href="#" style="color: silver; font-weight: lighter ">читать все новости</a>
                </div>
            </div>
            <div><?php echo nl2br(HTML::encode($news->text)); ?></div>
        </div>
        <?php } ?>
        <?php if (isset($event)) { ?>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xm-6 div-header-news">
                    Событие | <?php echo date('d.m.y', $event->time); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs" style="text-align: right; font-weight: normal">
                    <a href="#" style="color: silver; font-weight: lighter">читать все события</a>
                </div>
            </div>
            <div><?php echo nl2br(HTML::encode($event->text)); ?></div>
        </div>
        <?php } ?>
    </div>

    <div class="row" style="padding-top: 10px">
        <div class="col-lg-8 col-md-8 col-sm-12">
            <!-------- Т у р н и р ы  ------------------------------------------------------>
            <div class="row">
                <table class="tbl_t" style="width: 100%; padding-top: 20px;">
                    <thead>
                    <td>ID</td>
                    <td>Турнир</td>
                    <td>Сезон</td>
                    <td>Сетка</td>
                    <td>Создатель</td>
                    <td>Посл.изменение</td>
                    </thead>
                    <?php foreach(array_reverse($season) as $one){ ?>
                        <tr>
                            <td><?php echo $one->id; ?></td>
                            <td><?php echo T::name($one->t_id, 1); ?></td>
                            <td><?php echo HTML::encode($one->name); ?></td>
                            <td><?php echo Season::nets(1, $one->net_type); ?></td>
                            <td><?php echo User::name($one->admin_id); ?></td>
                            <td><?php echo date('d.m.y в H:i', $one->time_update); ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 hidden-sm hidden-xs" style="margin: 0; padding: 0; padding-left: 10px;">
            <!-- CHAT MAIN -->
            <?=$this->render('chatmain/view.php', ['msgs' => $msgs]); ?>
        </div>
    </div>
</div>
