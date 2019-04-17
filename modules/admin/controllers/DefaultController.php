<?php
namespace app\modules\admin\controllers;

use app\models\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use \Yii;

class DefaultController extends \yii\web\Controller
{
    public $layout = 'main-login';

        /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest)
            return $this->redirect(['/admin/carousel/index']);

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/admin/carousel/index']);
        }

        $model->password = '';
        return $this->render('login', [ 'model' => $model ]);
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }


}
