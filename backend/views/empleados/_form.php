<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'cedula')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'telefono1')->widget(\yii\widgets\MaskedInput::classname(), [
        'mask' => '(9999) 999 9999',
    ]) ?>
    <?= $form->field($model, 'telefomo2')->widget(\yii\widgets\MaskedInput::classname(), [
        'mask' => '(9999) 999 9999',
    ]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'notas')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar empleado' : 'Modificar empleado', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
