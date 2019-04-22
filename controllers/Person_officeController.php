<?php

namespace app\controllers;

use app\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\Settings;

class Person_officeController extends Controller
{
    public $layout = "custom";

    public function behaviors() {
        return [
            'verbs' => [
                'class'     => VerbFilter::class,
                'actions'   => [
                    'index'                 => ['GET', 'POST'],
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $modelLoginForm = new LoginForm();

        Yii::$app->view->params['modelSettings'] = Settings::find()->orderBy(['id' => SORT_DESC])->one();

        $params = compact(
            'modelLoginForm'
        );

        return $this->render('index', $params);
    }
}
