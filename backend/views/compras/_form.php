<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Productos;
use app\models\Facturas;

/* @var $this yii\web\View */
/* @var $model app\models\Compras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compras-form">

    <?php $form = ActiveForm::begin(); 
        $productos = ArrayHelper::map(Productos::find()->all(), 'id', 'nombres');
        $facturas = ArrayHelper::map(Facturas::find()->all(), 'id', 'numero_factura');
    ?>

   <!--  <?= $form->field($model, 'factura_id')->textInput() ?> -->
    <?= $form->field($model, 'factura_id')->dropDownList($facturas,['prompt'=>'Seleccionar factura']) ?>

   <!--  <?= $form->field($model, 'producto_id')->textInput() ?> -->
     <?= $form->field($model, 'producto_id')->dropDownList($productos,['prompt'=>'Seleccionar producto']) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'fraccion')->textInput() ?>

    <?= $form->field($model, 'precio_unitario')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'descuento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
