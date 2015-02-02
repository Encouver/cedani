<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Compras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compras-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'facturas_id')->textInput() ?>

    <?= $form->field($model, 'productos_id')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'fraccion')->textInput() ?>

    <?= $form->field($model, 'precio_unitario')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'descuento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
