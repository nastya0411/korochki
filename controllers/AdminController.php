<?php

namespace app\controllers;

use app\models\Order;
use app\models\OrderSerach;
use app\models\Status;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Order model.
 */
class AdminController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Order models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderSerach();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



    public function actionWork($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            $model->status_id = Status::getStatusId('Идет обучение');
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'По текущей заявке идет обучение!');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
    }

    public function actionApply($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost) {
            $model->status_id = Status::getStatusId('Обучение завершено');
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'По текущей заявке обучение завершено!');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
    }



    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
