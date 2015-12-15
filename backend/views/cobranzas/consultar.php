<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\daterange\DateRangePicker;


/* @var $this yii\web\View */
/* @var $searchModel app\models\CobranzasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if (isset($_GET['status'])){
    $status = $_GET['status'];
}else{
    $status = '0';
}

if ($status == 0){

    $this->title = 'Consultar histórico de cobranzas';
}else{
    $this->title = 'Consultar cobranzas pendientes';

}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cobranzas-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br>
<?php
if ($status == 0){

?>
    <div class="col-md-6">
            <h5 style="font-weight:600">Ver cobranzas del mes: </h5>


                <div class="cobranzas-form">
                    <?php $form = ActiveForm::begin([
                        'method' => 'post',
                        'action' => ['consultar?status=0'],
                    ]); ?>

                        <?php
                        echo '<div class="input-group drp-container">';
                        echo DateRangePicker::widget([
                            'name'=>'date_range_1',
                            'value'=>'',
                            'convertFormat'=>true,
                            'useWithAddon'=>true,
                            'pluginOptions'=>[
                                'format' => 'd-m-yy',
                                'separator'=>' al ',
                                'opens'=>'right'
                            ],
                            'options'=>['class'=>'drp-container form-group']

                        ]);
                        echo '</div>';

                        ?>

                        <div class="form-group">
                            <?= Html::submitButton('Consultar', ['consultar?status=0'], ['class' => 'h4', 'style'=> 'font-weight:600']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>

    </div>
<?php
}
?>



    <div class="col-md-12">
    <br><br>


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
                'rowOptions'=>function($model){
                        if($model->status_pago == 'Verificado'){
                            return['class'=>'success'];
                        }
                    },
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],

                   // 'id',
                   // 'factura_id',

                    [
                        'attribute'=>'fecha', 
                   //     'format'=>['date', 'php:d-m-Y']
                    ],

                    [ 
                       'attribute'=>'numero_factura',
                       //'label'=>'Numero de Control',
                       'value' =>'facturas.numero_factura'
                   ],

                    [ 
                       'attribute'=>'numero_control',
                       //'label'=>'Numero de Control',
                       'value' =>'facturas.numero_control'
                   ],
                    [ 
                        'attribute'=>'nombre_razonsocial',
                        'value' =>'facturas.cliente.nombre_razonsocial'
                    ],

                    'forma_pago',
                    'detalle_forma_pago',
                    [ 
                        'label' =>'Sub-total',
                        'attribute'=>'subtotal',
                        'value' =>'facturas.subtotal',
                        'format'=>['decimal', 2],
                        'pageSummary' => true

                    ],
                    [ 
                        'attribute'=>'IVA',
                        'value' =>'facturas.IVA',
                        'format'=>['decimal', 2],
                        'pageSummary' => true


                    ],
                    [ 
                        'attribute'=>'Neto cobrado',
                        'value' => function ($model) {
                            return $model->facturas->subtotal + $model->facturas->IVA;
                        },
                        'format'=>['decimal', 2],                        
                        'pageSummary' => true


                    ],

                    'status_pago',

                    ['class' => 'kartik\grid\ActionColumn'],

                ],
           // 'showPageSummary' => true,

            ]); 
            
            ?>
        <?php Pjax::end(); ?>
    </div>
</div>
