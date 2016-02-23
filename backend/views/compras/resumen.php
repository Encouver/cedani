<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Compras */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">

    <div class="col-md-12">

    <b>Factura N°: </b><?= $modelFactura->numero_factura;?><br>
    <b>N° Control: </b><?= $modelFactura->numero_control;?><br>
    <b>Fecha: </b><?= $modelFactura->fecha;?>

    <hr>

    <b>Nombre o Razón social: </b><?= $modelFactura->cliente->nombre_razonsocial;?><br>
    <b>Domicilio fiscal: </b><?= $modelFactura->cliente->domicilio_fiscal;?><br>
    <b>Rif: </b><?= $modelFactura->cliente->rif;?><br>
    <b>Teléfonos: </b><?= $modelFactura->cliente->telefono1.' - '.$modelFactura->cliente->telefono2.' - '.$modelFactura->cliente->telefono3;?>



    <hr>
    <b>Condiciones de pago: </b><?= $modelFactura->condiciones_pago?><br>
    <b>Descuento financiero: </b><?= $modelFactura->descuento_financiero?><br>
    <b>IVA: </b><?= $modelFactura->iva?>%

    <hr>
    <b>Descripción de la compra</b>  <br>  
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
               // 'filterModel' => $searchModel,
                'condensed'=>true,
                'showPageSummary' => true,
                'hover'=>true,
                'panel' => [
                    'type' => GridView::TYPE_DEFAULT,
                    'heading' => false,
                    'footer'=>false,

                ],
                'toolbar'=>false,
                'columns' => [
                    [
                    'class'=>'kartik\grid\SerialColumn',
                    //'width'=>'36px',
                    //'header'=>'Sorszám',
                    'pageSummary'=>'Totales'
                    ],
                    [
                      'attribute'=>'Producto',
                      'format' => 'html',
                      'value' => function ($model) {  
                            return '<div>'.$model->producto->ProductosFormato.'</div>';
                      },
                    ],
                    'cantidad',
                    'fraccion',
                    [
                      'attribute'=>'Descuento',
                      'format' => 'html',
                      'value' => function ($model) {  
                            return '<div>'.$model->descuento.' %</div>';
                      },
                    ],


                    [
                        'attribute'=>'precio_unitario',
                        'value' =>'precio_unitario',
                        'format'=>['decimal', 2],
                        'pageSummary' => true


                    ],

                    [ 
                        'attribute'=>'Importe',
                        'value' => function ($model) {
                            return $model->subtotal;
                        },
                        'format'=>['decimal', 2],                        
                        'pageSummary' => true


                    ],
                    [ 
                        'attribute'=>'IVA',
                        'value' => function ($model) {
                            return $model->IVA;
                        },
                        'format'=>['decimal', 2],                        
                        'pageSummary' => true


                    ],
                    [ 
                        'attribute'=>'Total',
                        'value' => function ($model) {

                            return $model->subtotal + $model->IVA;

                        },
                        'format'=>['decimal', 2],                        
                        'pageSummary' => true


                    ],


                ],
           
            ]); 
            
            ?>
    
<?php
if ($modelFactura->cerrada >= 1){ //cerrada o anulada

echo Html::a('Imprimir factura', ['finalizar','id' => $modelFactura->id], ['class' => 'btn btn-danger']);  
echo "&nbsp; &nbsp"; 

}
if ($modelFactura->cerrada == 0){
echo Html::a('Cerrar factura', ['finalizar','id' => $modelFactura->id], ['class' => 'btn btn-danger', 'data-confirm' => '¿Está seguro que desea dar por finalizada la factura?']);  
echo "&nbsp; &nbsp"; 
echo Html::a( 'Volver', Yii::$app->request->referrer, ['class' => 'btn btn-info']);

}

if ($modelFactura->cerrada == 3){ //anulada
echo Html::a('Reanudar factura', ['facturas/reanudar','facturas_id' => $modelFactura->id], ['class' => 'btn btn-danger', 'data-confirm' => '¿Está seguro que desea reanudar la factura?']);  
echo "&nbsp; &nbsp"; 
echo Html::a( 'Volver', Yii::$app->request->referrer, ['class' => 'btn btn-info']);

}


?>

    </div>
</div>