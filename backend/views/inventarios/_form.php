<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Productos;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Inventarios */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="inventarios-form">

    <?php $form = ActiveForm::begin();
     $productos = ArrayHelper::map(Productos::find()->all(), 'id', 'nombre');
     ?>



    <?= //$form->field($model, 'producto_id')->dropDownList($productos,['prompt'=>'Seleccionar producto']) 
         $form->field($model, 'producto_id')->widget(Select2::classname(), [
        'data' => $productos,
        'options' => ['placeholder' => 'Seleccionar producto'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])

    ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
