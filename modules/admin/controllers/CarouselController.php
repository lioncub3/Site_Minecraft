<?php

namespace app\modules\admin\controllers;
use app\models\CarouselData;
use \Yii;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class CarouselController extends \yii\web\Controller
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
        $dataProvider = new ActiveDataProvider(['query' => CarouselData::find(), 'pagination' => ['pageSize' => 10]]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCreate()
    {
        $model = new CarouselData();

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->save())
            {
                $dataProvider = new ActiveDataProvider(['query' => CarouselData::find(), 'pagination' => ['pageSize' => 10]]);
                Yii::$app->session->setFlash('success', 'Вкладка успешно добавлена!');
                return $this->redirect(['index', 'dataProvider' => $dataProvider]);
            }
        }

        return $this->render('createCarouselData', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = CarouselData::findOne(['id' => $id]);

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->save())
            {
                $dataProvider = new ActiveDataProvider(['query' => CarouselData::find(), 'pagination' => ['pageSize' => 10]]);
                Yii::$app->session->setFlash('success', 'Вкладка успешно изменена!');
                return $this->redirect(['index', 'dataProvider' => $dataProvider]);
            }
        }

        return $this->render('editCarouselData', ['model' => $model]);
    }

    public function actionDelete($id) {
        $model = CarouselData::findOne($id);
        $model->delete();

        Yii::$app->session->setFlash('success', 'Вкладка успешно удалена!');
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }


}
