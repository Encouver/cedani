   <?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FacturasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultar el inventario - Histórico';
$this->params['breadcrumbs'][] = ['label' => 'Inventario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventarios-consultar">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-lg-10">
    <?php \yii\widgets\Pjax::begin(); ?>

     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>true,
        'hover'=>true,
        'exportConfig' => [
            GridView::EXCEL => ['label'=>'EXCEL'],
            GridView::PDF => ['label'=>'PDF'],
        ],
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'before' =>"Escribirle lo de las búsquedas "
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'id',
            [
              'attribute'=>'marca',
              'format' => 'html',
              'value' => function ($model) {  
                    return '<div>'.$model->productos->marca.'</div>';
              },
            ],

            [
              'attribute'=>'nombre',
              'format' => 'html',
              'value' => function ($model) {  
                    return '<div>'.$model->productos->nombre.'</div>';
              },
            ],


            [
              'attribute'=>'formatoFull',
              'format' => 'html',
              'value' => function ($model) {  
                    return '<div>'.$model->productos->formato.' x '.$model->productos->formato2.'</div>';

              },
            ],
            'cantidad',
            [
                'attribute'=>'fecha', 
                'format'=>['date', 'php:Y-m-d']
            ],            
            [
           // class' => 'yii\grid\ActionColumn', 'template' => '{delete}'
          'class' => 'kartik\grid\ActionColumn', 'template' => '{delete}',
          'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>',
          'title'=>'Eliminar', 'data-toggle'=>'tooltip']

            ],

        ],
    ]); ?>
<?php \yii\widgets\Pjax::end(); ?>


<p>
<?= Html::a('Crear producto', Url::toRoute(['productos/create']), ['style'=> 'font-weight:600']) ?>
</p>

<p>
<?= Html::a('Consultar inventario actual', Url::toRoute(['inventarios-actual/index']), ['style'=> 'font-weight:600']) ?>
</p>

  </div>

</div>