<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Facturas;
use app\models\Compras;

/* @var $this yii\web\View */
/* @var $model app\models\NotasDeCredito */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notas-de-credito-form">

    <?php $form = ActiveForm::begin(); 
    $facturas = ArrayHelper::map(Facturas::find()->all(), 'id', 'numero_factura');
    $compras = ArrayHelper::map(Compras::find()->all(), 'id', function($compra){ return $compra->getFactura->numero_factura;});
    ?>

   <!--  <?= $form->field($model, 'factura_id')->textInput() ?> -->
    <?= $form->field($model, 'factura_id')->dropDownList($facturas,['prompt'=>'Seleccionar factura']) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

   <!--  <?= $form->field($model, 'compra_id')->textInput() ?> -->
   <?= $form->field($model, 'compra_id')->dropDownList($compras,['prompt'=>'Seleccionar compra']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
