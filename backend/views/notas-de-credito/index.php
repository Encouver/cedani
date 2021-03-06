<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NotasDeCreditoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notas De Creditos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notas-de-credito-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Notas De Credito', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'factura_id',
            'fecha',
            'compra_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
