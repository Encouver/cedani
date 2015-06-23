<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Productos;
use app\models\Facturas;
use kartik\widgets\ActiveForm;
use kartik\builder\TabularForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Compras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compras-form">

    <?php $form = ActiveForm::begin(); 
        $productos = ArrayHelper::map(Productos::find()->all(), 'id', 'nombre');
        $facturas = ArrayHelper::map(Facturas::find()->all(), 'id', 'numero_factura');
    ?>

<?php
    Modal::begin([
            'header'=>'<h4>Agregar producto',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);
    echo "<div id='modalContent'></div>";

    Modal::end();

?>




<?=TabularForm::widget([

    'dataProvider'=>$dataProvider,
    'form' => $form,
    'attributes' => [
        'factura_id' => ['type' => TabularForm::INPUT_STATIC],
        'producto_id' => ['type' => TabularForm::INPUT_TEXT],
        'cantidad' => ['type' => TabularForm::INPUT_TEXT],
    ],
    'gridSettings'=>[
        'floatHeader'=>true,
        'panel'=>[
            //'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Manage Books</h3>',
            'type' => GridView::TYPE_PRIMARY,
            'after'=> Html::button('<i class="glyphicon glyphicon-plus"></i> Añadir', ['value'=>Url::to('compras/create')], ['class'=>'btn btn-success'], ['id'=>'modalButton']) . ' ' . 
                    Html::a('<i class="glyphicon glyphicon-remove"></i> Eliminar', '#', ['class'=>'btn btn-danger']) . ' ' .
                    Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Guardar', ['class'=>'btn btn-primary'])
        ]
    ],   

]);




?>

    <?php ActiveForm::end(); ?>

<!--
   <!--  <?= $form->field($model, 'factura_id')->textInput() ?> 
    <?= $form->field($model, 'factura_id')->dropDownList($facturas,['prompt'=>'Seleccionar factura']) ?>

   <!--  <?= $form->field($model, 'producto_id')->textInput() ?> 
     <?= $form->field($model, 'producto_id')->dropDownList($productos,['prompt'=>'Seleccionar producto']) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'fraccion')->textInput() ?>

    <?= $form->field($model, 'precio_unitario')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'descuento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

-->
</div>
