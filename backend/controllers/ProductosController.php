<?php

namespace backend\controllers;

use Yii;
use app\models\Productos;
use app\models\ProductosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductosController implements the CRUD actions for Productos model.
 */
class ProductosController extends Controller
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
     * Lists all Productos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productos model.
     * @param integer $id
     * @param integer $productos_proveedores_id
     * @param integer $productos_proveedores_proveedores_id
     * @return mixed
     */
    public function actionView($id, $productos_proveedores_id, $productos_proveedores_proveedores_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $productos_proveedores_id, $productos_proveedores_proveedores_id),
        ]);
    }

    /**
     * Creates a new Productos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Productos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'productos_proveedores_id' => $model->productos_proveedores_id, 'productos_proveedores_proveedores_id' => $model->productos_proveedores_proveedores_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Productos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $productos_proveedores_id
     * @param integer $productos_proveedores_proveedores_id
     * @return mixed
     */
    public function actionUpdate($id, $productos_proveedores_id, $productos_proveedores_proveedores_id)
    {
        $model = $this->findModel($id, $productos_proveedores_id, $productos_proveedores_proveedores_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'productos_proveedores_id' => $model->productos_proveedores_id, 'productos_proveedores_proveedores_id' => $model->productos_proveedores_proveedores_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Productos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $productos_proveedores_id
     * @param integer $productos_proveedores_proveedores_id
     * @return mixed
     */
    public function actionDelete($id, $productos_proveedores_id, $productos_proveedores_proveedores_id)
    {
        $this->findModel($id, $productos_proveedores_id, $productos_proveedores_proveedores_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Productos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $productos_proveedores_id
     * @param integer $productos_proveedores_proveedores_id
     * @return Productos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $productos_proveedores_id, $productos_proveedores_proveedores_id)
    {
        if (($model = Productos::findOne(['id' => $id, 'productos_proveedores_id' => $productos_proveedores_id, 'productos_proveedores_proveedores_id' => $productos_proveedores_proveedores_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
