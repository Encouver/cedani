<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Facturas */

$this->title = 'Nueva factura';
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facturas-create">
<div class="row">
  <div class="col-md-6">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'num_factura' => $num_factura,

    ]) ?>
  </div>
</div>
</div>
