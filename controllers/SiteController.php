<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use yii\filters\AccessControl;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['logout', 'index'],
                        'roles' => ['@'], // solo usuarios logueados
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'], // invitados
                    ],
                ],
                'denyCallback' => function () {
                    return $this->redirect(['site/login']);
                },
            ],
        ];
    }

    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/index']);
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['site/login']);
    }

    public function actionIndex()
    {
        return $this->render('index'); // dashboard principal
    }

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }
}