<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'formato')->textInput() ?>

    <?= $form->field($model, 'formato2')->textInput() ?>

    <?= $form->field($model, 'kilo')->textInput() ?>

    <?= $form->field($model, 'precio_venta')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'precio_costo')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'excento_de_iva')->textInput() ?>

    <?= $form->field($model, 'producto_proveedor_id')->textInput() ?>

    <?= $form->field($model, 'producto_proveedor_proveedor_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
