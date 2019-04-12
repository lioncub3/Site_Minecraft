<?php

namespace app\modules\admin\controllers;
use yii\data\ActiveDataProvider;
use \Yii;
use app\models\Partners;
use yii\web\UploadedFile;

class PartnersController extends \yii\web\Controller
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
        $dataProvider = new ActiveDataProvider(['query' => Partners::find(), 'pagination' => ['pageSize' => 10]]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionUpdate()
    {
        $model = new Partners();

        if (Yii::$app->request->isGet) 
        {
            if (Yii::$app->request->get('id') != null) {
                $header = 'Редактирование данных партнёра';
                $model = Partners::findOne(['id' => Yii::$app->request->get('id')]);
                return $this->render('edit', compact('model', 'header'));
            } else {
                $header = 'Новый партнёр';
                return $this->render('edit', compact('model', 'header'));
            }
        }

        if ($model->load(Yii::$app->request->post())) {

            if (Yii::$app->request->post('Partners')['id'] != '') {
                $model_ = Partners::findOne(Yii::$app->request->post('Partners')['id']);
                $image_ = UploadedFile::getInstance($model, 'image_');

                if ($image_ == null) 
                {
                    $model_->image = $model->image;
                    $model_->link = $model->link;
                    $model_->name = $model->name;

                    if ($model_->save()) {
                        $dataProvider = new ActiveDataProvider(['query' => Partners::find(), 'pagination' => ['pageSize' => 10]]);
                        return $this->redirect(['index', 'dataProvider' => $dataProvider]);
                    }
                } else {
                    $model_->image = '/images/' . $image_->name;
                    $model_->link = $model->link;
                    $model_->name = $model->name;

                    // the path to save file, you can set an uploadPath
                    // in Yii::$app->params (as used in example below)
                    Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web';
                    $path = Yii::$app->params['uploadPath'] . $model_->image;

                    if ($model_->save()) {
                        $image_->saveAs($path);
                        $dataProvider = new ActiveDataProvider(['query' => Partners::find(), 'pagination' => ['pageSize' => 10]]);
                        return $this->redirect(['index', 'dataProvider' => $dataProvider]);
                    } else {
                        // error in saving model
                    }
                }
            } 
            else 
            {
                $image_ = UploadedFile::getInstance($model, 'image_');
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/images/';

                $path = Yii::$app->params['uploadPath'] . $image_->name;
                $model->image = '/images/' . $image_->name;

                if ($model->save()) 
                {
                    if ($image_)
                        $image_->saveAs($path);

                    $dataProvider = new ActiveDataProvider(['query' => Partners::find(), 'pagination' => ['pageSize' => 10]]);
                    return $this->redirect(['index', 'dataProvider' => $dataProvider]);
                } else {
                    // error in saving model
                }
            }
        }
    }

    public function actionPartnersDelete($id)
    {
        $model = Partners::findOne($id);
        $path = Yii::getAlias('@web') . $model->image;

        if (file_exists($path))
            FileHelper::unlink($path);

        $model->delete();
        
       return $this->redirect('index');
    }
}
