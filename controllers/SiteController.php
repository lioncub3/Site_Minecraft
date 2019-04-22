<?php

namespace app\controllers;

use app\models\CarouselData;
use app\models\History;
use app\models\LoginForm;
use app\models\Rules;
use app\models\SignupForm;
use Yii;
use app\models\Social;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\Gallery;
use app\models\Settings;
use yii\web\HttpException;

class SiteController extends Controller
{
    public $layout = "custom";

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'     => VerbFilter::class,
                'actions'   => [
                    'index'                 => ['GET', 'POST'],
                    'calendar'              => ['GET']
                ]
            ]
        ];
    }

    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $modelCarouselData = CarouselData::find()->all();

        $modelSocial  = Social::find()->orderBy(['id' => SORT_DESC])->one();

        $modelGallery = Gallery::find()->all();

        $modelHistory = History::findOne(1);

        $modelLoginForm = new LoginForm();

        Yii::$app->view->params['modelSettings'] = Settings::find()->orderBy(['id' => SORT_DESC])->one();

        $params = compact(
            'modelSocial',
            'modelGallery',
            'modelHistory',
            'modelCarouselData',
            'modelLoginForm'
        );

        if ($modelLoginForm->load(Yii::$app->request->post()) && $modelLoginForm->login()) {
            return $this->render('index', $params);
        }

        return $this->render('index', $params);
    }

    public function actionRules()
    {
        $modelRules = Rules::findOne('1');

        $modelLoginForm = new LoginForm();

        Yii::$app->view->params['modelSettings'] = Settings::find()->orderBy(['id' => SORT_DESC])->one();

        return $this->render('rules', ['modelRules' => $modelRules, 'modelLoginForm' => $modelLoginForm]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        $modelLoginForm = new LoginForm();

        Yii::$app->view->params['modelSettings'] = Settings::find()->orderBy(['id' => SORT_DESC])->one();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'modelLoginForm' => $modelLoginForm
        ]);
    }
}
