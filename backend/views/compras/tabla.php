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
                            return $model->precio_unitario * $model->cantidad - ($model->precio_unitario * $model->cantidad * $model->descuento / 100);
                        },
                        'format'=>['decimal', 2],                        
                        'pageSummary' => true


                    ],
                    [ 
                        'attribute'=>'IVA',
                        'value' => function ($model) {
                            return (($model->precio_unitario * $model->cantidad - ($model->precio_unitario * $model->cantidad * $model->descuento / 100)) * 0.12)*$model->producto->excento_de_iva;
                        },
                        'format'=>['decimal', 2],                        
                        'pageSummary' => true


                    ],
                    [ 
                        'attribute'=>'Total',
                        'value' => function ($model) {

                            return ($model->precio_unitario * $model->cantidad - ($model->precio_unitario * $model->cantidad * $model->descuento / 100)) + (($model->precio_unitario * $model->cantidad - ($model->precio_unitario * $model->cantidad * $model->descuento / 100)) * 0.12 * $model->producto->excento_de_iva);

                        },
                        'format'=>['decimal', 2],                        
                        'pageSummary' => true


                    ],


                ],
           
            ]); 
            
            ?>
    

    </div>
</div>