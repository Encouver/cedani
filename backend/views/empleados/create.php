<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Empleados */

$this->title = 'Registrar empleado';
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-create">
<div class="row">
  <div class="col-md-6">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>
</div>
</div>
