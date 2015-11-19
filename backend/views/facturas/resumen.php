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
<div class="facturas-view">
<!-- 
    <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Imprimir', '#', ['onClick'=>'printContent("printable_section")','class' => 'btn btn-primary', 
    'data-toggle'=>'tooltip', 
    'title'=>'Abrirá una ventana para imprimir la factura']) ?>

    <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Descargar PDF', ['descargar', 'id' => $model->id], ['class' => 'btn btn-primary','target'=>'_blank', 
    'data-toggle'=>'tooltip', 
    'title'=>'Descargar el archivo PDF de la factura.']) ?>
-->
    <div id="printable_section"> 
        <h1><?= Html::encode($this->title) ?></h1>

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
                'iva',
                [
                  'attribute'=>'status_entrega',
                   'value' => $model->status_entrega == 1 ? 'Entregado' : 'No entregado'

                ],

            ],
        ]) ?>
    </div>

    
    
    ¿Datos incorrectos?
    <?= Html::a('Modificar datos de la factura', Url::toRoute(['update', 'id' => $model->id]), ['style'=> 'font-weight:600']) ?>

 <br> 
    <br>
    <?= Html::a('Descripción de la factura', Url::toRoute(['compras/create', 'facturas_id' => $model->id]), ['class' => 'h4', 'style'=> 'font-weight:600']) ?>
    <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>



</div>
<script type="text/javascript">
        <!--
        function printContent(id){
        str=$("#"+id+"").html();
        newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
        newwin.document.write('<HTML>\n<HEAD>\n')
        newwin.document.write('<TITLE>Print Page</TITLE>\n')
        newwin.document.write('<script>\n')
        newwin.document.write('function chkstate(){\n')
        newwin.document.write('if(document.readyState=="complete"){\n')
        newwin.document.write('window.close()\n')
        newwin.document.write('}\n')
        newwin.document.write('else{\n')
        newwin.document.write('setTimeout("chkstate()",2000)\n')
        newwin.document.write('}\n')
        newwin.document.write('}\n')
        newwin.document.write('function print_win(){\n')
        newwin.document.write('window.print();\n')
        newwin.document.write('chkstate();\n')
        newwin.document.write('}\n')
        newwin.document.write('<\/script>\n')
        newwin.document.write('</HEAD>\n')
        newwin.document.write('<BODY onload="print_win()">\n')
        newwin.document.write(str)
        newwin.document.write('</BODY>\n')
        newwin.document.write('</HTML>\n')
        newwin.document.close()
        }
        //-->
</script>