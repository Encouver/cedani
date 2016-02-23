<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FacturasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facturación';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facturas-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-lg-6">
    <h2><?= Html::encode($this->title) ?></h2>
    <br>
            <?= Html::a('Nueva factura', ['create'], ['class' => 'h4', 'style'=> 'font-weight:600']) ?>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

            <br>
            <?= Html::a('Consultar facturas pendientes', ['consultar', 'status' => '1'], ['class' => 'h4', 'style'=> 'font-weight:600']) ?>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

            <br>
            <?= Html::a('Consultar histórico de facturas', ['consultar','status' => '0'], ['class' => 'h4', 'style'=> 'font-weight:600']) ?>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
            <br>
            <?= Html::a('Facturas anuladas', ['consultar','status' => '3'], ['class' => 'h4', 'style'=> 'font-weight:600']) ?>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>


    </div>


</div>
