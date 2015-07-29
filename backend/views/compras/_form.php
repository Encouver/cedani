<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Productos;
use app\models\Facturas;
use kartik\widgets\ActiveForm;
use kartik\builder\TabularForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Compras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compras-form">
    <?php $form = ActiveForm::begin(); 
        $productos = ArrayHelper::map(Productos::find()->all(), 'id', 'nombre');
    ?>


   <!--  <?= $form->field($model, 'factura_id')->textInput() ?>     -->

   <!--  <?= $form->field($model, 'producto_id')->textInput() ?> -->
     <?= $form->field($model, 'producto_id')->dropDownList($productos,['prompt'=>'Seleccionar producto']) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'fraccion')->textInput() ?>

    <?= $form->field($model, 'precio_unitario')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'descuento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


</div>
