<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use app\models\User;

//var_dump($news); exit;
?>
<div>
    <div>
        <span><?php echo User::name($msg->admin_id); ?>: </span>
        <span><?php echo nl2br(HTML::encode($msg->text)); ?></span>
    </div>
</div>