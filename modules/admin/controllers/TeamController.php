<?php
namespace app\modules\admin\controllers;

use app\models\Team;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;


class TeamController extends Controller
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
        $dataProvider = new ActiveDataProvider([
            'query' => Team::find(),
            'pagination' => ['pageSize' => 10]
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCreate() 
    {
        $model = new Team();
        $this->view->title = 'Команда';

        return $this->render('createTeam', compact('model'));
    }

    public function actionSaveInDb() {
        $model = new Team();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save();

                Yii::$app->session->setFlash('success', 'Команда успешно пополнилась новым человеком!');
                return $this->redirect('index');
            } else
                return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
    }

    public function actionEdit($id) {
        $model = Team::findOne($id);
        $this->view->title = 'Команда';

        return $this->render('editTeam', compact('model', 'id'));
    }

    public function actionUpdate($id) 
    {
        $model = Team::findOne($id);

        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                $model->save();

                Yii::$app->session->setFlash('success', 'Данные успешно редактированы!');
                return $this->redirect('index');
            }
        }
    }

    public function actionDelete($id) {
        $model = Team::findOne($id);
        $model->delete();

        Yii::$app->session->setFlash('success', 'Человек успешно удален из Вашей команды!');
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

}