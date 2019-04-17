<?php

namespace app\modules\admin\controllers;
use app\models\Rules;
use \Yii;
use yii\data\ActiveDataProvider;

class RulesController extends \yii\web\Controller
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

    public function actionIndex()
    {
        $id = 1;
        $model = Rules::findOne($id);


        if (!$model) {
            $model = new Rules();
            return $this->render('rules', compact('model', 'id'));
        }
        else {
            return $this->render('rules', compact('model', 'id'));
        }
    }

    public function actionUpdate($id)
    {
        $model = Rules::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Ваши правила успешно изменены!');

            return $this->redirect('/admin/rules');
        }
    }
}
