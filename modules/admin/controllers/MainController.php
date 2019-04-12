<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;
use app\models\Contacts;

use app\models\Services;
use app\models\Social;
use app\models\History;
use app\models\RegisterForm;
use app\models\User;
use app\models\Work;
use app\models\WorkDescr;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

/**
 * Default controller for the `admin` module
 */
class MainController extends Controller
{
    public $layout = "main";

    public function behaviors()
    {
        return [
            'access' => 
            [
                'class' => \yii\filters\AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ]
        ];
    }
 

    // *********************************************    Social Section        ************************************************

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionSocial()
    {
        $model = Social::find()->orderBy(['id' => SORT_DESC])->one();

        if (!$model)
            $model = new Social();

        return $this->render('editSocial', compact('model'));
    }

    public function actionSocialUpdate()
    {
        $model = Social::find()->orderBy(['id' => SORT_DESC])->one();

        if (!$model)
            $model = new Social();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->save();
        }

        return $this->render('editSocial', compact('model'));
    }
   
    public function actionError()
    {
        $this->layout = 'main-login';
        return $this->render('error');
    }
}
