<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Facturas */

$this->title = 'Modificar factura ' . ' ' . $model->numero_factura.' - '.$model->numero_control;
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'cliente_id' => $model->cliente_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="facturas-update">
<div class="row">
  <div class="col-md-6">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'num_factura' => $model,
    ]) ?>
</div>
</div>	
</div>
