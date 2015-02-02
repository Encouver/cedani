<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Facturas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facturas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clientes_id')->textInput() ?>

    <?= $form->field($model, 'numero_factura')->textInput() ?>

    <?= $form->field($model, 'numero_control')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'status_pago')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status_entrega')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'condiciones_pago')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'descuento_financiero')->textInput() ?>

    <?= $form->field($model, 'iva')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
