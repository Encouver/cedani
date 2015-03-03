   <?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FacturasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultar Facturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventarios-consultar">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
              'attribute'=>'producto_id',
              'format' => 'html',
              'value' => function ($model) {  
                    return '<div>'.$model->producto->marca.'</div>';
              },
            ],
            
            'cantidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>