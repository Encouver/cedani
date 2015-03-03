<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Facturas;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Cobranzas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cobranzas-form">

    <?php $form = ActiveForm::begin(); ?>
 <!--  
    <?//= $form->field($model, 'factura_id')->dropDownList(ArrayHelper::map(Facturas::find()->where(['status_pago'=> '1'])->all(), 'id', 'FacturasNumeroFacturasNumeroControl'), ['prompt'=>'Seleccionar factura'])  ?>

 -->
    <?php
    $clientes = ArrayHelper::map(Facturas::find()->where(['status_pago'=> '1'])->all(), 'id', 'FacturasNumeroFacturasNumeroControl');


    echo $form->field($model, 'factura_id')->widget(Select2::classname(), [
        'data' => $clientes,
        'options' => ['placeholder' => 'Seleccionar factura'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    
    ?>

    <?php   
            echo '<label>Fecha Factura</label>';
            echo DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'fecha',
                'convertFormat' => true,
                'type' => DateTimePicker::TYPE_INPUT,
                'name' => 'datetime_10',
                'options' => ['placeholder' => 'Selecciona fecha ...'],
                'pluginOptions' => [
                    'format' => 'd-M-yyyy h:i P',
                    'startDate' => date('d-M-yyy h:i P'),//'01-Mar-2014 12:00 AM',
                    'todayHighlight' => true,
                    'autoclose' => true,
                    'todayBtn' => true,
                    'language' => 'es'

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

    <?= $form->field($model, 'forma_pago')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'detalle_forma_pago')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status_pago')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
