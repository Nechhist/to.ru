<?php
/**
 * @var yii\web\View $this
 */

use yii\helpers\Html;

?>

<h1>load/index</h1>

<p>
    Yii2

    <?php if($uploaded): ?>
    <p> Файл успешно загружен. Проверьте <?php echo $dir ?> . </p>
    <?php endif; ?>
    <?php echo Html::beginForm('','post',['enctype' => 'multipart/form-data']) ?>
    <?php echo Html::error($model,'file') ?>
    <?php echo Html::activeFileInput($model,'file') ?>
    <?php echo Html::submitButton('Upload') ?>
    <?php Html::endForm() ?>
</p>
