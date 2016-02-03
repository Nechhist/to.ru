<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\SignupForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */
$this->title = 'Регистрация | '.Yii::$app->name;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-4">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?php echo $form->field($model, 'username')->label('Имя (логин)') ?>
                <?php echo $form->field($model, 'email')->label('Email (необязательно)') ?>
                <?php echo $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
                <?php echo $form->field($model, 'password_repeat')->passwordInput()->label('Подтверждение пароля') ?>
                <?php echo $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ])->label('Введите надпись на картинке') ?>
                <div class="form-group">
                    <?= Html::submitButton('Зарегистрировать нового пользователя', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>


<p>
<span class="grey">
    Доп.информация:<br />
    Логин (от 4 до 12 символов)<br />
    Пароль (от 1 до 255 символов)<br />
    Почта (активация через почту временно отключена, Вы сразу заходите на сайт под своим логиным/паролем)<br />
</span>
</p>