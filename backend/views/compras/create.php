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



$this->title = 'Create Compras';


/* @var $this yii\web\View */
/* @var $model app\models\Compras */
/* @var $form yii\widgets\ActiveForm */
?>
    <h1><?= Html::encode($this->title) ?></h1>

<div class="compras-create">

    <?php $form = ActiveForm::begin();?>

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
            'after'=>  
                    Html::a('<i class="glyphicon glyphicon-remove"></i> Eliminar', '#', ['class'=>'btn btn-danger']) . ' ' .
                    Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Guardar', ['class'=>'btn btn-primary'])
        ]
    ],   

]);

?>

    <?php ActiveForm::end(); ?>


<?php

$x= Yii::$app->getRequest()->getQueryParam('facturas_id');
echo Html::button('AGREGAR PRODUCTO',['value' => Url::toRoute(['compras/agregar', 'facturas_id' => $x]),'id' => 'modalButton','class' => 'btn btn-success']);

?>




</div>
