<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => 255]) ?>
    
    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'formato')->textInput() ?>
        </div>
        <div class="col-md-1" style="vertical-align: middle;">       
            <br><br> <p>x</p>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'formato2')->textInput() ?>
        </div>
        <div class="col-md-2">
    <?= $form->field($model, 'tipo_formato')->dropDownList(['0'=>'gr.', '1'=>'Kg.']) ?>
        </div>

    </div>



    <?= $form->field($model, 'kilo')->dropDownList(['0'=>'Sí', '1'=>'No']) ?>
<!-- Al multiplicar por 0 va a dar 0 -->
    <?=
    $form->field($model, 'precio_venta')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => 'Bs. ',
            'suffix' => '',
            'allowNegative' => false
        ]
    ]);
    ?>
<!--    <?=
    $form->field($model, 'precio_costo')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => 'Bs. ',
            'suffix' => '',
            'allowNegative' => false
        ]
    ]);
    ?>
-->
    <?= $form->field($model, 'excento_de_iva')->dropDownList(['0'=>'No', '1'=>'Sí']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar producto' : 'Modificar producto', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
