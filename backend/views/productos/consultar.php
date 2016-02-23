<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultar Productos';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--     <p>
        <?= Html::a('Create Productos', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

        <?php Pjax::begin(); ?>
        
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'responsive'=>true,
                'hover'=>true,
                'panel' => [
                    'type' => GridView::TYPE_DEFAULT,
                    'before' =>"Escribirle lo de las búsquedas "
                ],
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],

        

            //'id',
            'nombre',
            'descripcion',
            'marca',
            [
              'attribute'=>'formatoFull',
              'format' => 'html',
              'value' => function ($model) {  
                    return '<div>'.$model->FormatoFull.'</div>';
              },
            ],
            [
                'attribute' => 'kilo',
                'format' => 'boolean',
            ],
            [
                'attribute' => 'excento_de_iva',
                'value'=> 'excentoLabel',
            ],

             'precio_venta',
         //    'precio_costo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
            <?php Pjax::end(); ?>


</div>
<p>

            <?= Html::a('Crear producto', ['create'], ['style'=> 'font-weight:600']) ?>

</p>