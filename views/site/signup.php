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
<div class="container">
    <div class="site-signup">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <?php echo $form->field($model, 'username')->textInput(['size'=>'12', 'maxlength'=>'12', 'placeholder'=>'Введите Ваше будущее имя на сайте'])
            ->label($model->attributeLabels()['username'] . ' <span class="desc_field" >(от 4 до 12 символов)</span>'); ?>
        <?php echo $form->field($model, 'email')->textInput(['placeholder'=>'email@site.com'])
            ->label($model->attributeLabels()['email'] . ' <span class="desc_field" >(не обязательно)</span>'); ?>
        <?php echo $form->field($model, 'password')->passwordInput()->textInput(['size'=>'250', 'maxlength'=>'250', 'placeholder'=>'Введите пароль'])
            ->label($model->attributeLabels()['password'] . ' <span class="desc_field" >(от 1 до 250 символов)</span>'); ?>
        <?php echo $form->field($model, 'password_repeat')->passwordInput()->textInput(['size'=>'250', 'maxlength'=>'250', 'placeholder'=>'Повторите Ваш пароль'])
            ->label($model->attributeLabels()['password_repeat'] . ' <span class="desc_field" >(от 1 до 250 символов)</span>'); ?>
        <?php echo $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
        ])->label('Введите надпись на картинке') ?>

        <div class="form-group">
            <?= Html::submitButton('Зарегистрировать нового пользователя', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>