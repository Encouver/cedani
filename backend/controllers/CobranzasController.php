<?php

namespace backend\controllers;

use Yii;
use app\models\Cobranzas;
use app\models\CobranzasSearch;
use app\models\Facturas;

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

        return $this->render('index', [

        ]);
    }
    public function actionConsultar($status)
    {
        //$xx = "No verificado";

        $xx = $status;


        if(isset($_POST['date_range_1'])){
            
            $fecha = $_POST['date_range_1'];
            $inicial = substr($fecha, 0, 10);
            $final = substr($fecha, 14, 24);
            
            $fechai = date("Y-m-d", strtotime($inicial));
            $fechaf = date("Y-m-d", strtotime($final));

            $status= '0';
        $searchModel = new CobranzasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $status, $fechai, $fechaf);

        return $this->render('consultar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);

        }

        $fechai = '0';
        $fechaf = '0';

        $searchModel = new CobranzasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $status, $fechai, $fechaf);

        return $this->render('consultar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);

    }

    /**
     * Displays a single Cobranzas model.
     * @param integer $id
     * @param integer $factura_id
     * @return mixed
     */
    public function actionView($id, $factura_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $factura_id),
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

        if ($model->load(Yii::$app->request->post())) {

        $model->fecha = date_format(date_create($model->fecha), 'Y-m-d H:i:s');

        if ($model->save())
            return $this->redirect(['view', 'id' => $model->id, 'factura_id' => $model->factura_id]);
        return $this->render('index');

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionConsultarfecha(){

        if(isset($_POST['date_range_1'])){
            
            $fecha = $_POST['date_range_1'];
            $inicial = substr($fecha, 0, 10);
            $final = substr($fecha, 14, 24);
            
            $fecha_inicial = date("Y-m-d", strtotime($inicial));
            $fecha_final = date("Y-m-d", strtotime($final));

            $status= '0';

        $searchModel = new CobranzasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $status, $fecha_inicial, $fecha_final);

        return $this->render('consultar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);




        }else{

            return $this->redirect(Yii::$app->request->referrer);            
        }

    }
    /**
     * Updates an existing Cobranzas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $factura_id
     * @return mixed
     */
    public function actionUpdate($id, $factura_id)
    {
        $model = $this->findModel($id, $factura_id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        

            if ($model->status_pago == "Verificado"){ 
                $factura = Facturas::find()->where(['id' => $model->factura_id])->one();
                $factura->status_pago = "1";
//                print_r($factura->status_pago);
                $factura->update();
            }
        


            return $this->redirect(['view', 'id' => $model->id, 'factura_id' => $model->factura_id]);
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
     * @param integer $factura_id
     * @return mixed
     */
    public function actionDelete($id, $factura_id)
    {
        $this->findModel($id, $factura_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cobranzas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $factura_id
     * @return Cobranzas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $factura_id)
    {
        if (($model = Cobranzas::findOne(['id' => $id, 'factura_id' => $factura_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
