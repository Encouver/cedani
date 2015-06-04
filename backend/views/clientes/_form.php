<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_razonsocial')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'domicilio_fiscal')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'rif')->widget(\yii\widgets\MaskedInput::classname(), [
        'mask' => ' A99999999-9',
    ]) ?>

    <?= $form->field($model, 'telefono1')->widget(\yii\widgets\MaskedInput::classname(), [
        'mask' => '(9999) 999 9999',
    ]) ?>

    <?= $form->field($model, 'telefono2')->widget(\yii\widgets\MaskedInput::classname(), [
        'mask' => '(9999) 999 9999',
    ]) ?>

    <?= $form->field($model, 'telefono3')->widget(\yii\widgets\MaskedInput::classname(), [
        'mask' => '(9999) 999 9999',
    ]) ?>

    <?= $form->field($model, 'correo')->widget(\yii\widgets\MaskedInput::classname(), [
            'clientOptions' => [
        'alias' =>  'email'
    ],
    ]) ?>

    <?= $form->field($model, 'nombre_encargado')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'telefono_encargado')->widget(\yii\widgets\MaskedInput::classname(), [
        'mask' => '(9999) 999 9999',
    ]) ?>

    <?= $form->field($model, 'otro')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar cliente' : 'Modificar cliente', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
