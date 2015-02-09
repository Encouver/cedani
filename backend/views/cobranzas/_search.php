<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CobranzasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cobranzas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'factura_id') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'forma_pago') ?>

    <?= $form->field($model, 'detalle_forma_pago') ?>

    <?php // echo $form->field($model, 'status_pago') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
