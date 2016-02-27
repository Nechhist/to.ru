<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Season;
use app\models\News;
use app\models\T;
use app\models\User;
use app\models\Chatmain;
use app\models\SignupForm;


class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        $season = Season::findBySql('SELECT * FROM season WHERE invisible = 0 AND (unit1 != "" OR unit2 != "" OR unit3 != "" OR unit4 != "")')->all();
        $news = News::find()->where(['type'=>'1'])->orderBy('id DESC')->one();
        $event = News::find()->where(['type'=>'2'])->orderBy('id DESC')->one();
        $msgs = Chatmain::find()->orderBy('id DESC')->limit(50)->all();
        return $this->render('index',[
            'season' => $season,
            'news' => $news,
            'event' => $event,
            'msgs' => $msgs,
        ]);
    }

    public function actionRules(){
        return $this->render('rules');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        //echo Yii::$app->user->id;

        return $this->goHome();
    }

    /**
     * РЕГИСТРАЦИЯ
     * @return string|\yii\web\Response
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user, 3600*24*90)) {
                    //$this->mailSingup(Yii::$app->request->post()['SignupForm']);
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }



    /* на будущее - письмо, при регистрации
    public function mailSingup($user){
        //var_dump($user); exit;
        $to  = $user['email'];

        $subject = "Произошла регистрация на сайте tournamentonline.pro";

        $message = "
            <p>
                Добрый день.
                <br />
                Вы зарегистрировались на сайте
                <a href='tournamentonline.pro' target='_blank'>tournamentonline.pro</a>.
            </p>
            <p>
                Логин: " . $user['username'] . "
                <br />
                Пароль: " . $user['password'] . "
            </p>
        ";

        $headers  = "Content-type: text/html; charset=windows-1251 \r\n";
        $headers .= "From: Birthday Reminder <birthday@example.com>\r\n";
        $headers .= "Bcc: birthday-archive@example.com\r\n";

        Yii::$app->mail->compose()
        ->setTo('nechhhh@mail.ru')
        ->setFrom('tournamentonline.ru@gmail.com')
        ->setSubject('subject')
        ->setTextBody($message)
        ->send();

    }


    public function OLD_actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    */
}

