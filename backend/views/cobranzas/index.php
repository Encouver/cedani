<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CobranzasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cobranzas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cobranzas-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>
    <div class="col-lg-6">
            <?= Html::a('Nueva cobranza', ['create'], ['class' => 'h4', 'style'=> 'font-weight:600']) ?>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
            <br>
            <?= Html::a('Consultar cobranzas pendientes', ['consultar', 'status' => '1'], ['class' => 'h4', 'style'=> 'font-weight:600']) ?>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
            <br>
            <?= Html::a('Consultar histórico de cobranzas', ['consultar', 'status' => '0'], ['class' => 'h4', 'style'=> 'font-weight:600']) ?>
            <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
    </div>

</div>
