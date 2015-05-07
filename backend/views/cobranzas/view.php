<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cobranzas */

$this->title = "Ver cobranza";
$this->params['breadcrumbs'][] = ['label' => 'Cobranzas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cobranzas-view">

    <div class="col-lg-6">
    <h2><?= Html::encode($this->title) ?></h2>


        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'fecha:datetime',
                'facturas.numero_factura',
                'facturas.numero_control',
                'facturas.cliente.nombre_razonsocial',
                'forma_pago',
                'detalle_forma_pago',
                [
                'attribute'=>'Subtotal',
                'value'=>'Bs. '.$model->facturas->subtotal,
     
                ],

                [
                'attribute'=>'IVA',
                'value'=>'Bs. '.$model->facturas->IVA,
     
                ],

                [                      
                    'label' => 'Neto cobrado',
                    'value' =>'Bs. '.($model->facturas->subtotal + $model->facturas->IVA).'',
                ],
                'status_pago',
        [
            'label'=>'Ver factura',
            'format'=>'raw',
            'value'=>Html::a($model->facturas->FacturasNumeroFacturasNumeroControl, ['facturas/view', 'id' => $model->facturas->id]),

        ],
            ],


        ]) ?>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id, 'factura_id' => $model->factura_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id, 'factura_id' => $model->factura_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro que desea eliminar esta cobranza?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    </div>
</div>
