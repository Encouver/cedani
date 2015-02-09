<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cobranzas */

$this->title = 'Update Cobranzas: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cobranzas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'factura_id' => $model->factura_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cobranzas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
