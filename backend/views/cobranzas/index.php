<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CobranzasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cobranzas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cobranzas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva cobranza', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
           // 'factura_id',
            'fecha',
            [ 
                'attribute'=>'nombre_razonsocial',
                'value' =>'facturas.cliente.nombre_razonsocial'
            ],
            [ 
               'attribute'=>'numero_control',
               //'label'=>'Numero de Control',
               'value' =>'facturas.numero_control'
           ],
            'forma_pago',
            'detalle_forma_pago',


            'status_pago',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
