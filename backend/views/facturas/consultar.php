<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FacturasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if (isset($_GET['status'])){
    $status = $_GET['status'];
}else{
    $status = '0';
}

if ($status == 0){

    $this->title = 'Histórico de facturas';
}else{
    if ($status == 1){
        $this->title = 'Facturas pendientes';
    }else{
        $this->title = 'Facturas anuladas';

}
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


         //   ['class' => 'yii\grid\ActionColumn', 'template' => '{view}',],

        [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{view}',
        'buttons' => [
            'view' => function ($url, $model) {
                return $model->cerrada == '0' ? Html::a('<span class="glyphicon glyphicon-eye-open"></span>',  $url, ['title' => 'Ver']) : Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['compras/resumen','id'=>$model->id]), ['title' => Yii::t('app', 'Ver'),]);
            },
        ]

        ],




        ],
    ]); ?>

<?php
// arreglar echo "ST ".$model->Subtotal;

?>
</div>
