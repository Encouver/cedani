   <?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FacturasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultar Inventario';
$this->params['breadcrumbs'][] = ['label' => 'Inventario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventarios-consultar">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-lg-8">

     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
              'attribute'=>'marca',
              'format' => 'html',
              'value' => function ($model) {  
                    return '<div>'.$model->producto->marca.'</div>';
              },
            ],

            [
              'attribute'=>'producto',
              'format' => 'html',
              'value' => function ($model) {  
                    return '<div>'.$model->producto->nombre.'</div>';
              },
            ],


            [
              'attribute'=>'formato',
              'format' => 'html',
              'value' => function ($model) {  
                    return '<div>'.$model->producto->formato.' x '.$model->producto->formato2.'</div>';

              },
            ],




            'cantidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>

</div>