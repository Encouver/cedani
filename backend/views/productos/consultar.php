<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                'format' => 'boolean',
            ],

             'precio_venta',
             'precio_costo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
