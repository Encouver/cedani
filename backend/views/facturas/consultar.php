<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FacturasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultar Facturas';
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facturas-consultar">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'numero_factura',
            'numero_control',

            //'clienteNombre',
            //'clienteNombre.nombre_razonsocial',
            [
              'attribute'=>'cliente_id',
              'format' => 'html',
              'value' => function ($model) {  
                    return '<div>'.$model->cliente->nombre_razonsocial.'</div>';
              },
            ],
            ['attribute'=>'fecha', 'format'=>['date', 'php:d-m-Y']],
            //'status_pago',
            [
              'attribute'=>'status_pago',
              'format' => 'html',
              'value' => function ($model) {  
                    return '<div>'.$model->status_pago?'Pagado':'No Pagado'.'</div>';
              },
            ],
            [
              'attribute'=>'status_entrega',
              'format' => 'html',
              'value' => function ($model) {  
                    return '<div>'.$model->status_entrega?'Entregado':'No Entregado'.'</div>';
              },
            ],
            //'status_entrega',
            // 'condiciones_pago',
            // 'descuento_financiero',
            // 'iva',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}',
             'buttons' => [ 'imprimir' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url,[
                                'title' => 'Imprimir',
                                ]);
                           },
                           ]
                    ],
        ],
    ]); ?>

</div>
