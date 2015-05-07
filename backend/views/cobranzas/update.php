<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cobranzas */

$this->title = 'Actualizar cobranza';
$this->params['breadcrumbs'][] = ['label' => 'Cobranzas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'factura_id' => $model->factura_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cobranzas-update">

    <h2><?= Html::encode($this->title) ?></h2>
    <div class="col-lg-6">

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	  </div>
</div>
