<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InventariosActualSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultar Inventario Actual';
$this->params['breadcrumbs'][] = ['label' => 'Inventarios', 'url' => ['inventarios/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventarios-actual-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--
    <p>
        <?= Html::a('Create Inventarios Actual', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->
  <div class="row">
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

//            'id',

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
                    return '<div>'.$model->productos->FormatoFull.'</div>';
              },
            ],

 //           'producto_id',
            'cantidad',

        ],
    ]); ?>

<?php \yii\widgets\Pjax::end(); ?>
<p>
<?= Html::a('Crear producto', Url::toRoute(['productos/create']), ['style'=> 'font-weight:600']) ?>
</p>

<p>
<?= Html::a('Consultar inventario - Histórico', Url::toRoute(['inventarios/consultar']), ['style'=> 'font-weight:600']) ?>
</p>
</div>7</div>
</div>
