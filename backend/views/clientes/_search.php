<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre_razonsocial') ?>

    <?= $form->field($model, 'domicilio_fiscal') ?>

    <?= $form->field($model, 'rif') ?>

    <?= $form->field($model, 'telefono1') ?>

    <?php // echo $form->field($model, 'telefono2') ?>

    <?php // echo $form->field($model, 'telefono3') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'nombre_encargado') ?>

    <?php // echo $form->field($model, 'telefono_encargado') ?>

    <?php // echo $form->field($model, 'otro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
