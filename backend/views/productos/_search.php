<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'marca') ?>

    <?= $form->field($model, 'formato') ?>

    <?php // echo $form->field($model, 'formato2') ?>

    <?php // echo $form->field($model, 'kilo') ?>

    <?php // echo $form->field($model, 'precio_venta') ?>

    <?php // echo $form->field($model, 'precio_costo') ?>

    <?php // echo $form->field($model, 'excento_de_iva') ?>

    <?php // echo $form->field($model, 'producto_proveedor_id') ?>

    <?php // echo $form->field($model, 'producto_proveedor_proveedor_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
