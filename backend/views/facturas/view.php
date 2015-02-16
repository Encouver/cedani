<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Facturas */

$this->title = 'Factura: '.$model->numero_factura.'Cliente: '.$model->cliente->nombre_razonsocial;
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facturas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--         <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<?= Html::a('Delete', ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
    ],
]) ?> -->
    <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Imprimir', ['imprimir', 'id' => $model->id], ['class' => 'btn btn-primary','target'=>'_blank', 
    'data-toggle'=>'tooltip', 
    'title'=>'Will open the generated PDF file in a new window']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cliente_id',
            'numero_factura',
            'numero_control',
            'fecha',
            'status_pago',
            'status_entrega',
            'condiciones_pago',
            'descuento_financiero',
            'iva',
        ],
    ]) ?>

</div>
