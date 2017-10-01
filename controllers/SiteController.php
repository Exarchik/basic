<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MyForm;
use app\models\KavaFoodrink;
use app\models\KavaPersons;
use app\models\KavaData;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Js generator
     * 
     * @return
     */
    public function actionJs()
    {
        $this->layout = false;
        
        $persons = KavaPersons::find()->all();
        $napois = KavaFoodrink::find()->where(['type'=>'napoi'])->all();
        $snacks = KavaFoodrink::find()->where(['type'=>'snack'])->all();
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/javascript; charset=utf-8');

        return $this->render('js',compact('persons','napois','snacks'));
    }

    public function actionAjaxRequest()
    {
        $post = Yii::$app->request->post();
        if (isset($post)){
            $model = new KavaData();
            $_tmp = [];
      		// IP-адресс с которого сделан заказ
    		$_tmp['KavaData']['client_ip'] = $post['remote_addr'];
            // fio клиента
            $_tmp['KavaData']['surname'] = $post['client'];
    		// заказ клиента
    		$_tmp['KavaData']['products'] = serialize($post['order']);
            // общая сумма заказа
    		$_tmp['KavaData']['summary'] = $post['price'];
            
             if ($model->load($_tmp) && $model->save()) {
                print '<div class="kava-data">1</div>';
            } else {
                print '<div class="no-data">0</div>';
            }
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * SiteController::actionHello()
     *
     * @param string $message
     * @return
     */
    public function actionHello($message = 'DoYouLikeCoding?',$flash='Some information')
    {
        Yii::$app->session->setFlash('q-msg',$flash);

        return $this->render('hello',
            [
                'message'  =>   $message,
                'flash'     =>  $flash
            ]
        );
    }

    /**
     * SiteController::actionForm()
     *
     * @return
     */
    public function actionForm()
    {
        $form = new MyForm();

        if($form->load(Yii::$app->request->post()) && $form->validate()){
            $name = Html::encode($form->name);
            $email = Html::encode($form->email);
            $senddata = ['name'=>$name,'email'=>$email];
        }

        return $this->render('form',[
            'form' => $form,
            'data' => $senddata,
        ]);
    }

}
