<?php

namespace app\modules\admin\controllers;
use app\models\History;
use \Yii;

class HistoryController extends \yii\web\Controller
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
        $model = History::findOne($id);


        if (!$model) {
            $model = new History();
            return $this->render('history', compact('model', 'id'));
        }
        else {
            return $this->render('history', compact('model', 'id'));
        }
    }

    public function actionUpdate($id)
    {
        $model = History::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Ваша история успешно обновлена!');

            return $this->redirect('/admin/history');
        }
    }
}
