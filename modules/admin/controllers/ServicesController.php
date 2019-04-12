<?php

namespace app\modules\admin\controllers;
use \Yii;
use app\models\Services;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class ServicesController extends \yii\web\Controller
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
        $dataProvider = new ActiveDataProvider(['query' => Services::find()->where(['id_parent' => null]), 'pagination' => ['pageSize' => 10]]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCreate($id_parent)
    {
        $model = new Services();

        if ($model->load(Yii::$app->request->post()))
        {
            $model->id_parent  = $id_parent;
            if($model->save())
            {
                $dataProvider = new ActiveDataProvider(['query' => Services::find()->where(['id_parent' => null]), 'pagination' => ['pageSize' => 10]]);
                Yii::$app->session->setFlash('success', 'Подкатегория успешно добавлена!');
                return $this->redirect(['index', 'dataProvider' => $dataProvider]);
            }
        }

        return $this->render('createService', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = Services::findOne(['id' => $id]);

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->save())
            {
                $dataProvider = new ActiveDataProvider(['query' => Services::find()->where(['id_parent' => null]), 'pagination' => ['pageSize' => 10]]);
                Yii::$app->session->setFlash('success', 'Категория успешно изменена!');
                return $this->redirect(['index', 'dataProvider' => $dataProvider]);
            }
        }

        return $this->render('editService', ['model' => $model]);
    }

    public function actionDelete($id) {
        $model = Services::findOne($id);
        $model->delete();

        Yii::$app->session->setFlash('success', 'Подкатегория успешно удалена!');
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }


}
