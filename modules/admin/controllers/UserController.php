<?php

namespace app\modules\admin\controllers;
use app\models\User;
use app\models\RegisterForm;
use yii\data\ActiveDataProvider;
use \Yii;

class UserController extends \yii\web\Controller
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
        $dataProvider = new ActiveDataProvider(['query' => User::find(), 'pagination' => ['pageSize' => 10]]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCreate()
    {
        $model = new RegisterForm();
        $user = new User();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $user->username = $model->username;
            $user->password = md5($model->password);

            if ($user->save()) {
                Yii::$app->session->setFlash('success', 'Пользователь успешно создан!');
                return $this->redirect('/admin/user/index');
            }
        }

        return $this->render('create', compact('model'));
    }

    public function actionDelete($id)
    {
        $model = User::findOne($id);

        if($model)
            $model->delete();
      
        return $this->redirect('index');
    }

    public function actionUpdate($id)
    {
        $model = new RegisterForm();
        $user = User::findOne($id);

        if ($model->load(\Yii::$app->request->post()) ) 
        {
            $user->password = md5($model->password);
            if ($user->save()) {

                Yii::$app->session->setFlash('success', 'Пароль успешно изменён!');
                return $this->redirect('/admin/user/index');
            }
        }

        $model->username = $user->username;
        return $this->render('edit', compact('model', 'id'));
    }

}
