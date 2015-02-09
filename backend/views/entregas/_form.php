<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Facturas;

/* @var $this yii\web\View */
/* @var $model app\models\Entregas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entregas-form">

    <?php $form = ActiveForm::begin();     
        $facturas = ArrayHelper::map(Facturas::find()->all(), 'id', 'numero_factura');
    ?>

   <!--  <?= $form->field($model, 'factura_id')->textInput() ?> -->
    <?= $form->field($model, 'factura_id')->dropDownList($facturas,['prompt'=>'Seleccionar factura']) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'nota')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
