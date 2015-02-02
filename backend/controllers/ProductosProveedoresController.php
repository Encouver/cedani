<?php

namespace backend\controllers;

use Yii;
use app\models\ProductosProveedores;
use app\models\ProductosProveedoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductosProveedoresController implements the CRUD actions for ProductosProveedores model.
 */
class ProductosProveedoresController extends Controller
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
     * Lists all ProductosProveedores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductosProveedoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductosProveedores model.
     * @param integer $id
     * @param integer $proveedores_id
     * @return mixed
     */
    public function actionView($id, $proveedores_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $proveedores_id),
        ]);
    }

    /**
     * Creates a new ProductosProveedores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductosProveedores();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'proveedores_id' => $model->proveedores_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductosProveedores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $proveedores_id
     * @return mixed
     */
    public function actionUpdate($id, $proveedores_id)
    {
        $model = $this->findModel($id, $proveedores_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'proveedores_id' => $model->proveedores_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductosProveedores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $proveedores_id
     * @return mixed
     */
    public function actionDelete($id, $proveedores_id)
    {
        $this->findModel($id, $proveedores_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductosProveedores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $proveedores_id
     * @return ProductosProveedores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $proveedores_id)
    {
        if (($model = ProductosProveedores::findOne(['id' => $id, 'proveedores_id' => $proveedores_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
