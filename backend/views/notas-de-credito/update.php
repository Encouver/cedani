<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NotasDeCredito */

$this->title = 'Update Notas De Credito: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Notas De Creditos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'facturas_id' => $model->facturas_id, 'compras_id' => $model->compras_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notas-de-credito-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
