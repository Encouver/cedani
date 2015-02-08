<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Productos;

/* @var $this yii\web\View */
/* @var $model app\models\Inventarios */
/* @var $form yii\widgets\ActiveForm */

$items = ArrayHelper::map(Productos::find()->all(), 'id', 'nombres');

?>

<div class="inventarios-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'productos_id')->dropDownList($items,['prompt'=>'Seleccionar producto']) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
