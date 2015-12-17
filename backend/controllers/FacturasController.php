<?php

namespace backend\controllers;

use Yii;
use app\models\Facturas;
use app\models\Clientes;
use app\models\FacturasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * FacturasController implements the CRUD actions for Facturas model.
 */
class FacturasController extends Controller
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
     * Lists all Facturas models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [

        ]);
    }

    /**
     * Displays a single Facturas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single Facturas model.
     * @return mixed
     */
    public function actionConsultar($status)
    {

        $xx = $status;

        $searchModel = new FacturasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $xx);
        $dataProvider->pagination->pageSize=15;

        return $this->render('consultar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single Facturas model.
     * @param integer $id
     * @return mixed
     */


    /**
     * Creates a new Facturas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Facturas();


        $num_factura = Facturas::find()
        ->orderBy(['numero_factura' => SORT_DESC])
        ->one();


        if ($model->load(Yii::$app->request->post())) {

            $model->numero_factura = $num_factura->numero_factura + 1;
            $model->numero_control = $num_factura->numero_control + 1;

            $model->fecha = date_format(date_create($model->fecha), 'Y-m-d H:i:s');
            
            
            $cliente_contribuyente = Clientes::find()->where(['id' => $model->cliente_id])->one();


            $model->contribuyente = $cliente_contribuyente->contribuyente;

            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
           return $this->render('index');
        } else {
            return $this->render('create', [
                'model' => $model,
                'num_factura' => $num_factura,

            ]);
        }
    }

    /**
     * Updates an existing Facturas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, ]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'num_factura' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Facturas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Facturas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Facturas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Facturas::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
