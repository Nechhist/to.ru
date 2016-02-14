<?php
use yii\helpers\Html;
?>

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
                    <a href="#" onclick="alert('Извините, раздел в разработке.')" style="color: silver; font-weight: lighter ">читать все новости</a>
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
                    <a href="#" onclick="alert('Извините, раздел в разработке.')" style="color: silver; font-weight: lighter">читать все события</a>
                </div>
            </div>
            <div><?php echo nl2br(HTML::encode($event->text)); ?></div>
        </div>
    <?php } ?>

</div>
