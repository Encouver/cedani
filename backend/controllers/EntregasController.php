<?php

namespace backend\controllers;

use Yii;
use app\models\Entregas;
use app\models\EntregasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EntregasController implements the CRUD actions for Entregas model.
 */
class EntregasController extends Controller
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
     * Lists all Entregas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntregasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Entregas model.
     * @param integer $id
     * @param integer $facturas_id
     * @return mixed
     */
    public function actionView($id, $facturas_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $facturas_id),
        ]);
    }

    /**
     * Creates a new Entregas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Entregas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'facturas_id' => $model->facturas_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Entregas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $facturas_id
     * @return mixed
     */
    public function actionUpdate($id, $facturas_id)
    {
        $model = $this->findModel($id, $facturas_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'facturas_id' => $model->facturas_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Entregas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $facturas_id
     * @return mixed
     */
    public function actionDelete($id, $facturas_id)
    {
        $this->findModel($id, $facturas_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Entregas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $facturas_id
     * @return Entregas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $facturas_id)
    {
        if (($model = Entregas::findOne(['id' => $id, 'facturas_id' => $facturas_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
