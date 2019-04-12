<?php

namespace app\modules\admin\controllers;

use \Yii;
use app\models\Event;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;

class EventController extends Controller
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
        $dataProvider = new ActiveDataProvider(['query' => Event::find()->orderBy('date'), 'pagination' => ['pageSize' => 10]]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCreate()
    {
        $model = new Event();

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->save())
            {
                $dataProvider = new ActiveDataProvider(['query' => Event::find()->orderBy('date'), 'pagination' => ['pageSize' => 10]]);
                Yii::$app->session->setFlash('success', 'Событие успешно добавлено!');
                return $this->redirect(['index', 'dataProvider' => $dataProvider]);
            }
        }

        return $this->render('createEvent', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = Event::findOne(['id' => $id]);
        $model->date = (new \DateTime($model->date))->format('d.m.Y');

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->save())
            {
                $dataProvider = new ActiveDataProvider(['query' => Event::find()->orderBy('date'), 'pagination' => ['pageSize' => 10]]);
                Yii::$app->session->setFlash('success', 'Событие успешно изменено!');
                return $this->redirect(['index', 'dataProvider' => $dataProvider]);
            }
        }

        return $this->render('editEvent', ['model' => $model]);
    }

    public function actionDelete($id) {
        $model = Event::findOne($id);
        $model->delete();

        Yii::$app->session->setFlash('success', 'Событие успешно удалено!');
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
}