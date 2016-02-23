<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Facturas */

$this->title = 'Factura: '.$model->numero_factura.'. Cliente: '.$model->cliente->nombre_razonsocial;
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="col-md-12">
<div class="facturas-view">
<!-- 
    <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Imprimir', '#', ['onClick'=>'printContent("printable_section")','class' => 'btn btn-primary', 
    'data-toggle'=>'tooltip', 
    'title'=>'Abrirá una ventana para imprimir la factura']) ?>

    <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Descargar PDF', ['descargar', 'id' => $model->id], ['class' => 'btn btn-primary','target'=>'_blank', 
    'data-toggle'=>'tooltip', 
    'title'=>'Descargar el archivo PDF de la factura.']) ?>
-->
    <div class="col-md-8"> 
        <h2><?= Html::encode($this->title) ?></h2>

        <p>
    <!--         <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?> -->

        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                [
                  'attribute'=>'cliente_id',
                  'format' => 'html',
                  'value' => '<div>'.$model->cliente->nombre_razonsocial.'</div>',    
                ],
                'numero_factura',
                'numero_control',
                'fecha',
                'condiciones_pago',
                'descuento_financiero',
                [
                'attribute'=>'IVA %',
                'format'=> ['decimal', 0],
                'value' => $model->iva,
     
                ],
                [
                  'attribute'=>'status_entrega',
                   'value' => $model->status_entrega == 1 ? 'Entregado' : 'No entregado'

                ],

            ],
        ]) ?>

    
    
    ¿Datos incorrectos?
    <?= Html::a('Modificar datos de la factura', Url::toRoute(['update', 'id' => $model->id]), ['style'=> 'font-weight:600']) ?>

 <br> 
    <br>
    <?= Html::a('Descripción de la factura', Url::toRoute(['compras/create', 'facturas_id' => $model->id]), ['class' => 'h4', 'style'=> 'font-weight:600']) ?>
    <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
    <br><br>
    <?= Html::a('Anular factura', Url::toRoute(['facturas/anular', 'facturas_id' => $model->id]), ['class' => 'label label-default', 'style'=> 'font-weight:600' ,'data-confirm'=>'¿Está seguro que desea anular esta factura?']) ?>


    </div>
</div>
</div>
</div>
