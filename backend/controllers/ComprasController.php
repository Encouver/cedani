<?php

namespace backend\controllers;

use Yii;
use app\models\Compras;
use app\models\ComprasSearch;
use app\models\Facturas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

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

        $modelFactura = new Facturas();
        $b = $modelFactura->findOne(array('id'=>$facturas_id));


        $searchModel = new ComprasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $facturas_id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'facturas_id' => $model->facturas_id, 'productos_id' => $model->productos_id]);
        } else {
            return $this->render('create', [
                'dataProvider' => $dataProvider,
                'searchModel'=> $searchModel,
                'model' => $model,
                'modelFactura'=>$b,
            ]);
        }
    }


    public function actionTabla($id)
    {

        $model = new Compras();

        $modelFactura = new Facturas();
        $b = $modelFactura->findOne(array('id'=>$id));


        $searchModel = new ComprasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);


        return $this->render('tabla', [
                'dataProvider' => $dataProvider,
                'searchModel'=> $searchModel,
                'model' => $model,
                'modelFactura'=>$b,
            ]);


    }


    public function actionResumen($id)
    {

        $model = new Compras();

        $modelFactura = new Facturas();
        $b = $modelFactura->findOne(array('id'=>$id));


        $searchModel = new ComprasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);


        return $this->render('resumen', [
                'dataProvider' => $dataProvider,
                'searchModel'=> $searchModel,
                'model' => $model,
                'modelFactura'=>$b,
            ]);


    }

    public function actionFinalizar($id){
        $factura = Facturas::find()->where(['id' => $id])->one();
        $factura->cerrada = "1";
        $factura->update();



        //IMPRIMIR AQUI
        $mf = new Facturas();
        $modelFactura = $mf->findOne(array('id'=>$id));

        // get your HTML raw content without any layouts or scripts

        $contenido = '

        <table border="0" width="100%">
            <tr>
                <td style="width:300px">
                    <img src="'.Yii::getAlias('@web').'/img/logo.png'.'" class="logo" width="120px"/>
                    <hr>
                    Calle Bellas Artes, entre Ciencias y Stadium<br>
                    Quinta Pitalxa. Urb. Los Chaguaramos. <br>
                    Caracas, Venezuela<br>
                    Telf. 0414 302.58.13
                </td>
                <td style="text-align:right">
                    RIF: J-30931571-4<br>
                    Factura N° '.$modelFactura->numero_factura.'<br>
                    N° Control '.$modelFactura->numero_control.'<br>
                    Fecha '.$modelFactura->fecha.' <br>
                </td>

            </tr>

            <tr>

            </tr>


        </table>
        <hr>
        ';

        $contenido .= '

            <b>Nombre o Razón social:</b> '.$modelFactura->cliente->nombre_razonsocial.'<br>
            <b>Domicilio fiscal: </b>'.$modelFactura->cliente->domicilio_fiscal.'<br>
            <b>Rif: </b>'.$modelFactura->cliente->rif.'<br>
            <b>Teléfonos: </b> '.$modelFactura->cliente->telefono1.' - '.$modelFactura->cliente->telefono2.' - '.$modelFactura->cliente->telefono3.'<br>

            <hr>

            <b>Condiciones de pago: </b> '.$modelFactura->condiciones_pago.'<br>



        ';


        $model = new Compras();

        $searchModel = new ComprasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);




        $contenido .= $this->renderPartial('tabla', ['id' => $id, 'modelFactura'=>$modelFactura, 'model'=>$model, 'dataProvider'=>$dataProvider]);


        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'filename'=>$modelFactura->cliente->nombre_razonsocial.' - '.$modelFactura->numero_factura.' - '.$modelFactura->fecha.'.pdf',
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_DOWNLOAD, 
            // your html content input
            'content' => $contenido,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => $modelFactura->cliente->nombre_razonsocial.' - '.$modelFactura->numero_factura.' - '.$modelFactura->fecha],
             // call mPDF methods on the fly
            'methods' => [ 
             //   'SetHeader'=>[$model->cliente->nombre_razonsocial.' - '.$model->numero_factura.' - '.$model->fecha], 
             //   'SetFooter'=>['{PAGENO}'],
            ]
        ]);

/*        $pdf = new Pdf([
             'filename'=>$model->cliente->nombre_razonsocial.' - '.$model->numero_factura,
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'content' => $this->renderPartial('_imprimir'),
            'options' => [
                'title' => 'Privacy Policy - Krajee.com',
                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'methods' => [
                'SetHeader' => ['Generated By: Krajee Pdf Component||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
        */
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }




    public function actionAgregar($facturas_id)
    {
        $model = new Compras();
        $searchModel = new ComprasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $facturas_id);

        $model->factura_id = $facturas_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) { //envia completo y guarda
               Yii::$app->getSession()->setFlash('success', 'Compra añadida a la factura');
            return $this->redirect(['compras/create', 'facturas_id'=>$facturas_id]);

        } else {
            if ($model->load(Yii::$app->request->post())) { //envia mal
               Yii::$app->getSession()->setFlash('error', 'La compra no ha sido añadido a la factura, debe llenar todos los campos');
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
            return $this->redirect(['compras/create', 'facturas_id'=>$factura_id]);

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
