<?php
namespace app\models;
use app\models\User;
use yii\base\Model;
use Yii;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Имя'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Пароль'),
            'password_repeat' => Yii::t('app', 'Пароль (повтор)'),
            'verifyCode' => 'Verification Code',
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => Yii::t('app','Ошибка регистрации! Это имя уже занято.')],
            ['username', 'string', 'min' => 4, 'max' => 12],
            ['email', 'filter', 'filter' => 'trim'],
            //['email', 'required'],
            ['email', 'email'],
            //['email', 'unique', 'targetClass' => '\app\models\User', 'message' => Yii::t('app','Ошибка регистрации! Этот емаил уже задействован.')],
            [['password','password_repeat'], 'required'],
            [['password','password_repeat'], 'string', 'min' => 1, 'max' => 250],
            [['password'], 'in', 'range'=>['password','Password','Password123','letmein','monkey'] ,'not'=>true, 'message'=>Yii::t('app', 'Ошибка регистрации! Пароль слишком легкий... Придумайте другой.')],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message' => Yii::t("app", "Ошибка регистрации! Пароль должен совпарать!")],
            ['verifyCode', 'captcha'],
        ];
    }


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();

            return $user;
        }
        return null;
    }
}