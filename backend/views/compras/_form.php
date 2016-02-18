<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Productos;
use app\models\Facturas;
use kartik\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Compras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compras-form">
    <?php $form = ActiveForm::begin(); 
        $productos = ArrayHelper::map(Productos::find()->all(), 'id', 'ProductosFormato');

    echo $form->field($model, 'producto_id')->widget(Select2::classname(), [
        'data' => $productos,
        'options' => ['placeholder' => 'Seleccionar producto', 'id'=>'producto'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);



    ?>


   <!--  <?= $form->field($model, 'factura_id')->textInput() ?>     -->

   <!--  <?= $form->field($model, 'producto_id')->textInput() ?> -->
<!--     <?= $form->field($model, 'producto_id')->dropDownList($productos,['prompt'=>'Seleccionar producto']) ?>-->

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'fraccion')->textInput() ?>

    <?= $form->field($model, 'precio_unitario')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'descuento')->textInput(array('value' => '0')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar compra' : 'Modificar compra', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php
$script = <<< JS

$('#producto').change(function(){
    var productoId = $(this).val();
    
    $.get('../productos/get-precio',{ productoId : productoId }, function(data){
        var data = $.parseJSON(data);
        $('#compras-precio_unitario').attr('value',data.precio_venta);
    })  

});

JS;
$this->registerJS($script)
?>

</div>
