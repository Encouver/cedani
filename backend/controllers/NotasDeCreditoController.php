<?php

namespace backend\controllers;

use Yii;
use app\models\NotasDeCredito;
use app\models\NotasDeCreditoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NotasDeCreditoController implements the CRUD actions for NotasDeCredito model.
 */
class NotasDeCreditoController extends Controller
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
     * Lists all NotasDeCredito models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NotasDeCreditoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NotasDeCredito model.
     * @param integer $id
     * @param integer $facturas_id
     * @param integer $compras_id
     * @return mixed
     */
    public function actionView($id, $facturas_id, $compras_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $facturas_id, $compras_id),
        ]);
    }

    /**
     * Creates a new NotasDeCredito model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NotasDeCredito();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'facturas_id' => $model->facturas_id, 'compras_id' => $model->compras_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NotasDeCredito model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $facturas_id
     * @param integer $compras_id
     * @return mixed
     */
    public function actionUpdate($id, $facturas_id, $compras_id)
    {
        $model = $this->findModel($id, $facturas_id, $compras_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'facturas_id' => $model->facturas_id, 'compras_id' => $model->compras_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NotasDeCredito model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $facturas_id
     * @param integer $compras_id
     * @return mixed
     */
    public function actionDelete($id, $facturas_id, $compras_id)
    {
        $this->findModel($id, $facturas_id, $compras_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NotasDeCredito model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $facturas_id
     * @param integer $compras_id
     * @return NotasDeCredito the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $facturas_id, $compras_id)
    {
        if (($model = NotasDeCredito::findOne(['id' => $id, 'facturas_id' => $facturas_id, 'compras_id' => $compras_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
