<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

$this->title = 'Обратная связь | '.Yii::$app->name;
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Турнир онлайн, удобные турнирные сетки']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Обратная связь с создателями сайта']);

?>

<div class="container">

    <div class="row">

        <h1>Обратная связь</h1>

        <div class="col-lg-7 col-md-7 col-sm-7 col-xm-12">

            <h3>Предложения, пожелания, жалобы</h3>

            <?php if ($openContactForm) { ?>

            <div class="contact-form">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'type')->dropDownList(Yii::$app->params['typeContact']) ?>

                <?= $form->field($model, 'text')->textarea(['rows' => 5, 'cols' => 50, 'placeholder' => 'Максимально 250 символов.']) ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Опубликовать сообщение' : 'Опубликовать сообщение', ['class' => 'button_creat_tournament']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>

            <?php } else { ?>

            <div class="red">
                Установлено ограничение: одно сообщение от пользователя в 1 час!
                <br />
                (У Вас осталось <?=$restTime?> мин.)
            </div>

            <?php } ?>

        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xm-12">
            <h3>Контакты:</h3>
            <p>
                По общим вопросам обращайтесь к <a href="https://vk.com/rabbit_died">С. Шевцов</a>.
            </p>
            <p>
                По вопросам разрабитки к <a href="https://vk.com/nechhist">А. Нечистый</a>.
            </p>
        </div>
    </div>

    <div class="row">
        <h2>Стена сообщений</h2>

        <table id="msgs" class="tbl_msgs">
            <?php foreach($msgs as $one){ ?>
                <tr>
                    <th><?php echo User::name($one['admin_id']) ?><br/><span style="font-size: xx-small; color: #c0c0c0;">(<?php echo date('d.m.y', $one['time']) ?>)</th>
                    <td><?php echo nl2br(HTML::encode($one['text'])) ?></td>
                </tr>
            <?php } ?>
        </table>

    </div>

</div>
