<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'telefono1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'telefono2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'telefono3')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'cuenta_bancaria1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'banco_cuenta_bancaria1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'datos_cuenta_bancaria1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'cuenta_bancaria2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'banco_cuenta_bancaria2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'datos_cuenta_bancaria2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'cuenta_bancaria3')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'banco_cuenta_bancaria3')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'datos_cuenta_bancaria3')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'notas')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
