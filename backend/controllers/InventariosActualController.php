<?php

namespace backend\controllers;

use Yii;
use app\models\InventariosActual;
use app\models\InventariosActualSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InventariosActualController implements the CRUD actions for InventariosActual model.
 */
class InventariosActualController extends Controller
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
     * Lists all InventariosActual models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InventariosActualSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InventariosActual model.
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
     * Creates a new InventariosActual model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InventariosActual();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'producto_id' => $model->producto_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InventariosActual model.
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
     * Deletes an existing InventariosActual model.
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
     * Finds the InventariosActual model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $producto_id
     * @return InventariosActual the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $producto_id)
    {
        if (($model = InventariosActual::findOne(['id' => $id, 'producto_id' => $producto_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
