<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosProveedores */

$this->title = 'Update Productos Proveedores: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productos Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'proveedor_id' => $model->proveedor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productos-proveedores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
