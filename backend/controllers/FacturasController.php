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

    public function actionResumen($id)
    {


        return $this->render('resumen', [
            'model' => $this->findModel($id),
        ]);

    }
    public function actionDescargar($id)
    {
        $model = $this->findModel($id);


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
                    Factura N° '.$model->numero_factura.'<br>
                    N° Control '.$model->numero_control.'<br>
                    Fecha '.$model->fecha.' <br>
                </td>

            </tr>

            <tr>

            </tr>


        </table>
        <hr>
        ';

        $contenido .= '

            <b>Nombre o Razón social:</b> '.$model->cliente->nombre_razonsocial.'<br>
            <b>Domicilio fiscal: </b>'.$model->cliente->domicilio_fiscal.'<br>
            <b>Rif: </b>'.$model->cliente->rif.'<br>
            <b>Teléfonos: </b> '.$model->cliente->telefono1.' - '.$model->cliente->telefono2.' - '.$model->cliente->telefono3.'<br>

            <hr>

            <b>Condiciones de pago: </b> '.$model->condiciones_pago.'<br>



        ';

        $contenido .= $this->renderPartial('view',['model' => $model]);


        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'filename'=>$model->cliente->nombre_razonsocial.' - '.$model->numero_factura.' - '.$model->fecha.'.pdf',
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
            'options' => ['title' => $model->cliente->nombre_razonsocial.' - '.$model->numero_factura.' - '.$model->fecha],
             // call mPDF methods on the fly
            'methods' => [ 
             //   'SetHeader'=>[$model->cliente->nombre_razonsocial.' - '.$model->numero_factura.' - '.$model->fecha], 
                'SetFooter'=>['{PAGENO}'],
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

    /**
     * Creates a new Facturas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Facturas();

        if ($model->load(Yii::$app->request->post())) {
            $model->fecha = date_format(date_create($model->fecha), 'Y-m-d H:i:s');
            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
           return $this->render('index');
        } else {
            return $this->render('create', [
                'model' => $model,
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
