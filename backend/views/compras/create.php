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



$this->title = 'Agregar compras a la factura';

/* @var $this yii\web\View */
/* @var $model app\models\Compras */
/* @var $form yii\widgets\ActiveForm */
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="compras-create">


<?php
    Modal::begin([
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
echo Html::button('AGREGAR PRODUCTO',['value' => Url::toRoute(['compras/agregar', 'facturas_id' => $x]),'id' => 'modalButton','class' => 'btn btn-success']);

?>


<?php \yii\widgets\Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'responsive'=>true,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
              'attribute'=>'nombre',
              'format' => 'html',
              'value' => function ($model) {  
                    return '<div>'.$model->producto->nombre.'</div>';
              },
            ],

            'cantidad',
            'fraccion',
            'precio_unitario',
            'descuento',
             ['class' => 'yii\grid\ActionColumn'],
       ],
    ]); 
    ?>


<?php \yii\widgets\Pjax::end(); ?>






</div>
