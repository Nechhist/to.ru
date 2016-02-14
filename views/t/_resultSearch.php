<?php
use app\models\User;
use yii\helpers\Html;
?>
<?php if($ts!=null){ ?>
    <?php foreach($ts as $one){ ?>
        <a href="<?=Yii::$app->urlManager->createUrl(['t/view']).'/'.$one['id']?>">
            <?=Html::encode($one['name'])?>
        </a>
        (ID#<?=$one['id']?>) Создатель: <?=User::name($one['admin_id'])?>
        <br />
    <?php } ?>
<?php }else echo 'Турниров не найдено...'; ?>