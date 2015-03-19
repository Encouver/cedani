<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CobranzasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultar cobranzas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cobranzas-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>true,
        'hover'=>true,
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'before' =>"Escribirle lo de las búsquedas "
        ],
        'rowOptions'=>function($model){
                if($model->status_pago == 'Verificado'){
                    return['class'=>'success'];
                }

            },
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

           // 'id',
           // 'factura_id',

            [
                'attribute'=>'fecha', 
                'format'=>['date', 'php:d-m-Y']
            ],

            [ 
               'attribute'=>'numero_factura',
               //'label'=>'Numero de Control',
               'value' =>'facturas.numero_factura'
           ],

            [ 
               'attribute'=>'numero_control',
               //'label'=>'Numero de Control',
               'value' =>'facturas.numero_control'
           ],
            [ 
                'attribute'=>'nombre_razonsocial',
                'value' =>'facturas.cliente.nombre_razonsocial'
            ],

            'forma_pago',
            'detalle_forma_pago',
            [ 
                'label' =>'Sub-total',
                'attribute'=>'subtotal',
                'value' =>'facturas.subtotal'

            ],
            [ 
                'attribute'=>'IVA',
                'value' =>'facturas.IVA',

            ],
            [ 
                'attribute'=>'Neto cobrado',
                'value' => function ($model) {
                    return $model->facturas->subtotal + $model->facturas->IVA;
                },
            ],




            'status_pago',

            ['class' => 'kartik\grid\ActionColumn'],

        ],
   // 'showPageSummary' => true,

    ]); 
    
    ?>
    <?php Pjax::end(); ?>
</div>
