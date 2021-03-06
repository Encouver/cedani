<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Productos;
use app\models\Facturas;
use kartik\widgets\ActiveForm;
use kartik\builder\TabularForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\DetailView;

$this->title = 'Descripción de la factura';

/* @var $this yii\web\View */
/* @var $model app\models\Compras */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    $facturas_id = Yii::$app->getRequest()->getQueryParam('facturas_id');
?>

<div class="compras-create">
<div class="row">
    <div class="col-md-12">

        <h2><?= Html::encode($this->title) ?></h2>
        <h3><?= $modelFactura->facturasNumeroFacturasNumeroControl;?></h3>
        <h4><?= $modelFactura->fecha;?></h4>

        <?php

            Modal::begin([
                'options' => [
                    'id' => 'modal',
                    'tabindex' => false // important for Select2 to work properly
                ],
                    'header'=>'<h4>Agregar producto',
                    'id'=>'modal',
                    'size'=>'modal-lg',
                ]);
            echo "<div id='modalContent'></div>";

            Modal::end();
        ?>

        <?php if(Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= Yii::$app->session->getFlash('error'); ?>
            </div>
        <?php endif; ?>

        <?php if(Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif; ?>


        <?php

        $x= Yii::$app->getRequest()->getQueryParam('facturas_id');
        echo Html::button('Agregar producto',['value' => Url::toRoute(['compras/agregar', 'facturas_id' => $x]),'id' => 'modalButton','class' => 'btn btn-link','style'=>'font-weight:600;font-size:14px']);

        ?>
    </div>
    
    <div class="col-md-12">
        <?php Pjax::begin(); ?>
        
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
               // 'filterModel' => $searchModel,
                'responsive'=>true,
                'showPageSummary' => true,
                'hover'=>true,
                'panel' => [
                    'type' => GridView::TYPE_DEFAULT,
                    'before' =>"Escribirle lo de las búsquedas "
                ],
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


                    [
                        'attribute'=>'fraccion',
                        'header'=>'Fracción',
                        'format'=>'raw',    
                        'value' => function($model, $key, $index)
                        {   
                            if($model->fraccion == '0')
                            {
                                return '-';
                            }
                            else
                            {   
                                return $model->fraccion;
                            }
                        },
                    ],


                    'descuento',


                    [
                        'attribute'=>'precio_unitario',
                        'value' =>'precio_unitario',
                        'format'=>['decimal', 2],
                        'pageSummary' => true


                    ],

                    [ 
                        'attribute'=>'Importe',
                        'value' => function ($model) {
                            return $model->subtotal;                        },
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

            [
           // class' => 'yii\grid\ActionColumn', 'template' => '{delete}'
          'class' => 'kartik\grid\ActionColumn', 'template' => '{delete}',
          'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>',
          'title'=>'Eliminar', 'data-toggle'=>'tooltip'],
   

            ],

                ],
           
            ]); 
            
            ?>
        <?php Pjax::end(); ?>
    
        <?= Html::a('Finalizar factura', ['/compras/resumen','id' => $x], ['class' => 'btn btn-danger']) ?>

    </div>

    <?//= Html::a('Finalizar factura', ['/facturas/descargar','id' => $x], ['class' => 'btn btn-danger', 'data-confirm' => '¿Está seguro de que desea dar por finalizada la factura?']) ?>
</div>
</div>
