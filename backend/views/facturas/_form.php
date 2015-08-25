<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Clientes;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
//use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Facturas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facturas-form">

    <?php $form = ActiveForm::begin(); 
    $clientes = ArrayHelper::map(Clientes::find()->all(), 'id', 'nombre_razonsocial');
    ?>

  <!--   <?= $form->field($model, 'cliente_id')->textInput() ?> -->

      <?=         $form->field($model, 'cliente_id')->widget(Select2::classname(), [
                'data' => $clientes,
                'options' => ['placeholder' => 'Seleccionar cliente'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])
        ?>
        ¿Nuevo cliente?
        <?= Html::a('Registrar cliente', ['/clientes/create'], ['style'=> 'font-weight:600']) ?>
        <br><br>
    <?= $form->field($model, 'numero_factura')->textInput() ?>

    <?= $form->field($model, 'numero_control')->textInput() ?>

    <!-- <?= $form->field($model, 'fecha')->textInput() ?> -->

    <?php   
            echo '<label>Fecha Factura</label>';
            echo DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'fecha',
                'convertFormat' => true,
                'type' => DateTimePicker::TYPE_INPUT,
                'name' => 'datetime_10',
                'options' => ['placeholder' => 'Selecciona fecha ...'],
                'readonly' => true,
                'pluginOptions' => [
                    'format' => 'd-M-yyyy h:i P',
                    'startDate' => date('d-M-yyy h:i P'),//'01-Mar-2014 12:00 AM',
                    'todayHighlight' => true,
                    'autoclose' => true,
                    'todayBtn' => true
                ]
            ]);

   /*         echo DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'fecha',
                'language' => 'es',
                'size' => 'ms',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd MM yyyy - HH:ii P',
                    'todayBtn' => true
                ]
            ]);*/
        ?>
    <br>
    <?= $form->field($model, 'status_pago')->dropDownList(['0'=>'No verificado', '1'=>'Verificado'],['prompt'=>'Seleccionar']) ?>

    <?= $form->field($model, 'status_entrega')->dropDownList(['1'=>'Entregado', '0'=>'No entregado']) ?>

    <?= $form->field($model, 'condiciones_pago')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'descuento_financiero')->textInput() ?>

    <?= $form->field($model, 'iva')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear factura' : 'Modificar factura', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
