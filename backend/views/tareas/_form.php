<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Tareas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tareas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php

        echo '<label>Fecha</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'fecha',
                'name' => 'fecha',
                'options' => ['placeholder' => 'Selecciona fecha ...'],
                'convertFormat' => true,
                'pluginOptions' => [
                    'format' => 'd-M-yyyy',
                    'startDate' => date('d-m-Y'),//'01-Mar-2014 12:00 AM',
                    'todayHighlight' => true
                ]
            ]);
    ?>

    <?= $form->field($model, 'tarea')->textArea(['maxlength' => true]) ?>

    

    <?php

        echo '<label>Recordatorio</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'recordatorio',
                'name' => 'recordatorio',
                'options' => ['placeholder' => 'Selecciona fecha ...'],
                'convertFormat' => true,
                'pluginOptions' => [
                    'format' => 'd-M-yyyy',
                    'startDate' => date('d-m-Y'),//'01-Mar-2014 12:00 AM',
                    'todayHighlight' => true
                ]
            ]);
    ?>

    <?= $form->field($model, 'prioridad')->textInput() ?>

    <?= $form->field($model, 'completado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
