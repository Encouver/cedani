<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductosProveedores */

$this->title = 'Create Productos Proveedores';
$this->params['breadcrumbs'][] = ['label' => 'Productos Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-proveedores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
