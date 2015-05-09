<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Productos */

$this->title = 'Agregar Producto';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-create">
    <div class="col-md-6">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
