<?php

namespace backend\controllers;

use Yii;
use app\models\HistoricoPrecios;
use app\models\HistoricoPreciosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HistoricoPreciosController implements the CRUD actions for HistoricoPrecios model.
 */
class HistoricoPreciosController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all HistoricoPrecios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HistoricoPreciosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HistoricoPrecios model.
     * @param integer $id
     * @param integer $producto_id
     * @return mixed
     */
    public function actionView($id, $producto_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $producto_id),
        ]);
    }

    /**
     * Creates a new HistoricoPrecios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HistoricoPrecios();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'producto_id' => $model->producto_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HistoricoPrecios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $producto_id
     * @return mixed
     */
    public function actionUpdate($id, $producto_id)
    {
        $model = $this->findModel($id, $producto_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'producto_id' => $model->producto_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HistoricoPrecios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $producto_id
     * @return mixed
     */
    public function actionDelete($id, $producto_id)
    {
        $this->findModel($id, $producto_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HistoricoPrecios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $producto_id
     * @return HistoricoPrecios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $producto_id)
    {
        if (($model = HistoricoPrecios::findOne(['id' => $id, 'producto_id' => $producto_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
