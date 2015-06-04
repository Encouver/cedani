<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultar Clientes';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--     <p>
        <?= Html::a('Registrar Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
        <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'responsive'=>true,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre_razonsocial',
            //'domicilio_fiscal',
            'rif',
            'telefono1',
            // 'telefono2',
            // 'telefono3',
             'correo',
             'nombre_encargado',
            // 'telefono_encargado',
            // 'otro',
             [  
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:50px;'],
                'template' => '{view} {delete}',
                'buttons' => [
                            'delete' => function ($url, $model) {
                                return !$model->facturas ? Html::a('<i class="glyphicon glyphicon-remove"></i>', 
                                       $url, 
                                       [
                                        'title'=>'Eliminar', 
                                        'data-toggle'=>'tooltip',
                                        'data-method' => 'post',
                                        'data-confirm' => '¿Está seguro que desea eliminar este cliente?',

                                        ]) : '';
                            },            
                ],

             ],
        ],
    ]); 
    ?>
        <?php Pjax::end(); ?>

</div>
            <?= Html::a('Registrar cliente', ['create'], ['style'=> 'font-weight:600']) ?>
