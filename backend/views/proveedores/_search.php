<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProveedoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido') ?>

    <?= $form->field($model, 'telefono1') ?>

    <?= $form->field($model, 'telefono2') ?>

    <?php // echo $form->field($model, 'telefono3') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'cuenta_bancaria1') ?>

    <?php // echo $form->field($model, 'banco_cuenta_bancaria1') ?>

    <?php // echo $form->field($model, 'datos_cuenta_bancaria1') ?>

    <?php // echo $form->field($model, 'cuenta_bancaria2') ?>

    <?php // echo $form->field($model, 'banco_cuenta_bancaria2') ?>

    <?php // echo $form->field($model, 'datos_cuenta_bancaria2') ?>

    <?php // echo $form->field($model, 'cuenta_bancaria3') ?>

    <?php // echo $form->field($model, 'banco_cuenta_bancaria3') ?>

    <?php // echo $form->field($model, 'datos_cuenta_bancaria3') ?>

    <?php // echo $form->field($model, 'notas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
