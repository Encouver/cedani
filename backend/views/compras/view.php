<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Compras */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compras-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'facturas_id' => $model->facturas_id, 'productos_id' => $model->productos_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'facturas_id' => $model->facturas_id, 'productos_id' => $model->productos_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'facturas_id',
            'productos_id',
            'cantidad',
            'fraccion',
            'precio_unitario',
            'descuento',
        ],
    ]) ?>

</div>
