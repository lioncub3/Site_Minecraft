<?php

namespace app\modules\admin\controllers;
use app\models\Gallery;
use app\models\Services;
use yii\data\Pagination;
use \Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class GalleryController extends \yii\web\Controller
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

    public function actionIndex($id = Gallery::CATEGORY_INTERIOR_DESIGN)
    {
        $query = Gallery::find()->where(['id_services' => $id])->orderBy(['id' => SORT_DESC]);
        $countQuery = clone $query;
        $photos_in_category = $countQuery->count();

        $pages = new Pagination(['totalCount' => $photos_in_category, 'pageSize' => 12]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        $id_services = $id;

        $services = Services::find()->all();

        return $this->render('index', compact('models', 'pages', 'id_services', 'photos_in_category', 'services'));
    }

    public function actionUpload($id)
    {

        $model = new Gallery();
        
        if ($model->load(Yii::$app->request->post())) 
        {
            $photo = UploadedFile::getInstance($model, 'image');

            if ( $photo != null ) 
            {
                $rand = rand(0, 9999);
                $newName = $rand . date("Y_m_d") . '.' . $photo->extension;
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web';

                $main_dir = Yii::$app->basePath . '/web/images/gallery';
                if(!file_exists($main_dir))
                    FileHelper::createDirectory($main_dir, 0777, true);

                $dir = $main_dir . '/' . $id;
                if(!file_exists($dir))
                    FileHelper::createDirectory($dir, 0777, true);

                $path = 'images/gallery/'. $id . '/' . $newName;
                $photo->saveAs($path);

                $model->url_image = $path;
                $model->name = $newName;
                $model->id_services = $id;
            }

            $model->save(false);
            return $this->redirect('index?id='. $id);
        }
        
        return $this->render('upload', compact('model'));
    }

    public function actionDelete()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $pic = Yii::$app->request->post()['photoUrl'];
        $image = Gallery::find()->where(['url_image' => $pic])->one();

        if ($image->delete() & unlink($pic)) {
            return ['status'=> 'ok'];
        } else {
            return ['status'=> 'no'];
        }
    }

}
