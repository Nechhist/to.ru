<?php
use app\models\User;
use yii\helpers\Html;
?>
<?php if($ts!=null){ ?>
    <?php foreach($ts as $one){ ?>
        <?=Html::a(Html::encode($one['name']), '/' . $one['id'])?>
        (ID#<?=$one['id']?>) Создатель: <?=User::name($one['admin_id'])?>
        <br />
    <?php } ?>
<?php } else echo 'Турниров не найдено...'; ?>