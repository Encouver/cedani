<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Clientes;
use kartik\datetime\DateTimePicker;
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
      <?= $form->field($model, 'cliente_id')->dropDownList($clientes,['prompt'=>'Seleccionar cliente']) ?>

    <?= $form->field($model, 'numero_factura')->textInput() ?>

    <?= $form->field($model, 'numero_control')->textInput() ?>

    <!-- <?= $form->field($model, 'fecha')->textInput() ?> -->

    <?php   
            echo '<label>Fecha Factura</label>';
            echo DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'fecha',
                'name' => 'datetime_10',
                'options' => ['placeholder' => 'Selecciona fecha ...'],
                'convertFormat' => true,
                'pluginOptions' => [
                    'format' => 'd-M-yyyy h:i P',
                    'startDate' => date('d-m-Y h:i A'),//'01-Mar-2014 12:00 AM',
                    'todayHighlight' => true
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

    <?= $form->field($model, 'status_pago')->dropDownList(['0'=>'No Pagado', '1'=>'Pagado'],['prompt'=>'Seleccionar']) ?>

    <?= $form->field($model, 'status_entrega')->dropDownList(['0'=>'No Entregado', '1'=>'Entregado'],['prompt'=>'Seleccionar']) ?>

    <?= $form->field($model, 'condiciones_pago')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'descuento_financiero')->textInput() ?>

    <?= $form->field($model, 'iva')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
