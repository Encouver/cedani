<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FacturasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if (isset($_GET['status'])){
    $status = $_GET['status'];
}else{
    $status = '0';
}

if ($status == 0){

    $this->title = 'Consultar histórico de facturas';
}else{
    $this->title = 'Consultar facturas pendientes';

}



$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facturas-consultar">

    <h2><?= Html::encode($this->title) ?></h2>
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
                'attribute' => 'status_pago',
                'value' => function ($model) {
                    return $model->status_pago ? 'Verificado' : 'No verificado';
                },
            ],            
            [
                'attribute' => 'status_entrega',
                'value' => function ($model) {
                    return $model->status_entrega ? 'Entregado' : 'No entregado';
                },
            ],            

            //'status_entrega',
            // 'condiciones_pago',
            // 'descuento_financiero',
            // 'iva',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}',
            ],
        ],
    ]); ?>
<?php
// arreglar echo "ST ".$model->Subtotal;

?>
</div>
