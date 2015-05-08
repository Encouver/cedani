<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Productos;
use app\models\Proveedores;
use kartik\select2\Select2;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Inventarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventarios-form">

        <?php $form = ActiveForm::begin(); 

         $productos = ArrayHelper::map(Productos::find()->all(), 'id', 'ProductosFormato');
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

        <?
         $proveedores = ArrayHelper::map(Proveedores::find()->all(), 'id', 'NombreApellido');
        ?>

        <?=
             $form->field($model, 'proveedor_id')->widget(Select2::classname(), [
            'data' => $proveedores,
            'options' => ['placeholder' => 'Seleccionar proveedor'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])

        ?>
<?=
$form->field($model, 'precio_costo')->widget(MaskMoney::classname(), [
    'pluginOptions' => [
        'prefix' => 'Bs. ',
        'suffix' => '',
        'allowNegative' => false
    ]
]);
?>

        <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
</div>
