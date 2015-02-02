<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'productos_proveedores_id' => $model->productos_proveedores_id, 'productos_proveedores_proveedores_id' => $model->productos_proveedores_proveedores_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'productos_proveedores_id' => $model->productos_proveedores_id, 'productos_proveedores_proveedores_id' => $model->productos_proveedores_proveedores_id], [
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
            'nombre',
            'descripcion',
            'marca',
            'formato',
            'formato2',
            'kilo',
            'precio_venta',
            'precio_costo',
            'excento_de_iva',
            'productos_proveedores_id',
            'productos_proveedores_proveedores_id',
        ],
    ]) ?>

</div>