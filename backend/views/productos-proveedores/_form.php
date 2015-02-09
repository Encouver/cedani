<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Proveedores;
use app\models\Productos;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosProveedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-proveedores-form">

    <?php $form = ActiveForm::begin(); 
     $proveedores = ArrayHelper::map(Proveedores::find()->all(), 'id', 'nombre');
    $productos = ArrayHelper::map(Productos::find()->all(), 'id', 'nombre');
    ?>

   <!--  <?= $form->field($model, 'proveedor_id')->textInput() ?> -->
    <?= $form->field($model, 'proveedor_id')->dropDownList($proveedores,['prompt'=>'Seleccionar proveedor']) ?>
    
   <!--  <?= $form->field($model, 'producto_id')->textInput() ?> -->
   <?= $form->field($model, 'producto_id')->dropDownList($productos,['prompt'=>'Seleccionar productos']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
