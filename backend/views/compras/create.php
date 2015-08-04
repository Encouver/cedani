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
use yii\widgets\Pjax;



$this->title = 'Descripción de la factura';

/* @var $this yii\web\View */
/* @var $model app\models\Compras */
/* @var $form yii\widgets\ActiveForm */
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="compras-create">


<?php

    Modal::begin([
        'options' => [
            'id' => 'modal',
            'tabindex' => false // important for Select2 to work properly
        ],
            'header'=>'<h4>Agregar producto',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);
    echo "<div id='modalContent'></div>";

    Modal::end();
?>

<?php if(Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>


<?php

$x= Yii::$app->getRequest()->getQueryParam('facturas_id');
echo Html::button('Agregar compra',['value' => Url::toRoute(['compras/agregar', 'facturas_id' => $x]),'id' => 'modalButton','class' => 'btn btn-link','style'=>'font-weight:600;font-size:14px']);

?>

    <div class="col-md-12">
        <?php Pjax::begin(); ?>
        
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'responsive'=>true,
                'showPageSummary' => true,
                'hover'=>true,
                'panel' => [
                    'type' => GridView::TYPE_DEFAULT,
                    'before' =>"Escribirle lo de las búsquedas "
                ],
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],

                    [
                      'attribute'=>'Producto',
                      'format' => 'html',
                      'value' => function ($model) {  
                            return '<div>'.$model->producto->ProductosFormato.'</div>';
                      },
                    ],
                    'cantidad',
                    'fraccion',
                    'descuento',


                    [
                        'attribute'=>'precio_unitario',
                        'value' =>'precio_unitario',
                        'format'=>['decimal', 2],
                        'pageSummary' => true


                    ],

                    [ 
                        'attribute'=>'Importe',
                        'value' => function ($model) {
                            return $model->precio_unitario * $model->cantidad;
                        },
                        'format'=>['decimal', 2],                        
                        'pageSummary' => true


                    ],

                    ['class' => 'kartik\grid\ActionColumn'],

                ],
           
            ]); 
            
            ?>
        <?php Pjax::end(); ?>
    

subtotal

<br>
iva <br>

    </div>


</div>
