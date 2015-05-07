<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FacturasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facturas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cliente_id') ?>

    <?= $form->field($model, 'numero_factura') ?>

    <?= $form->field($model, 'numero_control') ?>

    <?= $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'status_pago') ?>

    <?php // echo $form->field($model, 'status_entrega') ?>

    <?php // echo $form->field($model, 'condiciones_pago') ?>

    <?php // echo $form->field($model, 'descuento_financiero') ?>

    <?php // echo $form->field($model, 'iva') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
