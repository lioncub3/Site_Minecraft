<?php

namespace app\controllers;

use app\models\CarouselData;
use app\models\History;
use app\models\LoginForm;
use app\models\Rules;
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

    public function behaviors() {
        return [
            'verbs' => [
                'class'     => VerbFilter::class,
                'actions'   => [
                    'index'                 => ['GET'],
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

        return $this->render('index', $params);
    }

    public function actionRules()
    {
        $modelRules = Rules::findOne('1');

        $modelLoginForm = new LoginForm();

        Yii::$app->view->params['modelSettings'] = Settings::find()->orderBy(['id' => SORT_DESC])->one();

        return $this->render('rules', ['modelRules' => $modelRules, 'modelLoginForm' => $modelLoginForm]);
    }
}
