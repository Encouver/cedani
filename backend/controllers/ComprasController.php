<?php

namespace backend\controllers;

use Yii;
use app\models\Compras;
use app\models\ComprasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ComprasController implements the CRUD actions for Compras model.
 */
class ComprasController extends Controller
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
     * Lists all Compras models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComprasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Compras model.
     * @param integer $id
     * @param integer $facturas_id
     * @param integer $productos_id
     * @return mixed
     */
    public function actionView($id, $factura_id, $producto_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $factura_id, $producto_id),
        ]);
    }

    /**
     * Creates a new Compras model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($facturas_id)
    {
        $model = new Compras();

        $searchModel = new ComprasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $facturas_id);

        



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'facturas_id' => $model->facturas_id, 'productos_id' => $model->productos_id]);
        } else {
            return $this->render('create', [
                'dataProvider' => $dataProvider,
                'searchModel'=> $searchModel,
                'model' => $model,
            ]);
        }
    }


    public function actionAgregar($facturas_id)
    {
        $model = new Compras();
        $searchModel = new ComprasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $facturas_id);

        $model->factura_id = $facturas_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) { //envia completo y guarda
               Yii::$app->getSession()->setFlash('success', 'Producto añadido a la factura');
            return $this->redirect(['compras/create', 'facturas_id'=>$facturas_id]);

        } else {
            if ($model->load(Yii::$app->request->post())) { //envia mal
               Yii::$app->getSession()->setFlash('error', 'El producto no ha sido añadido a la factura, debe llenar todos los campos');
               return $this->redirect(['compras/create', 'facturas_id'=>$facturas_id]);
            }else{
                return $this->renderAjax('agregar', [ //no ha enviado
                    'dataProvider' => $dataProvider,
                    'model' => $model,
                    'idf' =>$facturas_id,
                ]);
            }
        }
    }


    /**
     * Updates an existing Compras model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $facturas_id
     * @param integer $productos_id
     * @return mixed
     */
    public function actionUpdate($id, $factura_id, $producto_id)
    {
        $model = $this->findModel($id, $factura_id, $producto_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'factura_id' => $model->factura_id, 'producto_id' => $model->producto_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Compras model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $facturas_id
     * @param integer $productos_id
     * @return mixed
     */
    public function actionDelete($id, $factura_id, $producto_id)
    {
        $this->findModel($id, $factura_id, $producto_id)->delete();

        return $this->redirect(['compras/create', 'facturas_id'=>$factura_id]);
    }

    /**
     * Finds the Compras model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $facturas_id
     * @param integer $productos_id
     * @return Compras the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $factura_id, $producto_id)
    {
        if (($model = Compras::findOne(['id' => $id, 'factura_id' => $factura_id, 'producto_id' => $producto_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
