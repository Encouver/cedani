<?php

namespace backend\controllers;

use Yii;
use app\models\Cobranzas;
use app\models\CobranzasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CobranzasController implements the CRUD actions for Cobranzas model.
 */
class CobranzasController extends Controller
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
     * Lists all Cobranzas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CobranzasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cobranzas model.
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
     * Creates a new Cobranzas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cobranzas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'facturas_id' => $model->facturas_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cobranzas model.
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
     * Deletes an existing Cobranzas model.
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
     * Finds the Cobranzas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $facturas_id
     * @return Cobranzas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $facturas_id)
    {
        if (($model = Cobranzas::findOne(['id' => $id, 'facturas_id' => $facturas_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
