<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'producto_id',
            'cantidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
