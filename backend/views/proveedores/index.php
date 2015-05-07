<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProveedoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proveedores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proveedores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Proveedores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'apellido',
            'telefono1',
            'telefono2',
            // 'telefono3',
            // 'direccion',
            // 'correo',
            // 'cuenta_bancaria1',
            // 'banco_cuenta_bancaria1',
            // 'datos_cuenta_bancaria1',
            // 'cuenta_bancaria2',
            // 'banco_cuenta_bancaria2',
            // 'datos_cuenta_bancaria2',
            // 'cuenta_bancaria3',
            // 'banco_cuenta_bancaria3',
            // 'datos_cuenta_bancaria3',
            // 'notas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
