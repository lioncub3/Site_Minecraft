<?php

namespace app\modules\admin\controllers;
use app\models\Settings;
use \Yii;
use yii\web\UploadedFile;

class SettingsController extends \yii\web\Controller
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
        $model = Settings::find()->orderBy(['id' => SORT_DESC])->one();

        if (!$model)
            $model = new Settings();

        return $this->render('index', compact('model'));
    }

    public function actionUpdate()
    {
        $model = Settings::find()->orderBy(['id' => SORT_DESC ])->one();

        if (!$model)
            $model = new Settings();

        if ($model->load(Yii::$app->request->post())) {
            $photo = UploadedFile::getInstance($model, 'image');

            if ($photo != null) 
            {
                $rand = rand(0, 9999);
                $newName = $rand . date("Y_m_d") . '.' . $photo->name;

                $model->url_image = '/images/' . $newName;

                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web';
                $path = Yii::$app->params['uploadPath'] . $model->url_image;
                $photo->saveAs($path);
                $model->name_image = $newName;
            }

            $model->save(false);
        }
        return $this->render('index', compact('model'));
    }

}
