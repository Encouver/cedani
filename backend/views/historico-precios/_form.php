<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Productos;

/* @var $this yii\web\View */
/* @var $model app\models\HistoricoPrecios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historico-precios-form">

    <?php $form = ActiveForm::begin();
    $productos = ArrayHelper::map(Productos::find()->all(), 'id', 'nombres');
     ?>

   <!--  <?= $form->field($model, 'producto_id')->textInput() ?> -->
    <?= $form->field($model, 'producto_id')->dropDownList($productos,['prompt'=>'Seleccionar producto']) ?>

    <?= $form->field($model, 'precio')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
