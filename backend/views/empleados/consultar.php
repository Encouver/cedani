<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpleadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultar Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?/*= Html::a('Create Empleados', ['create'], ['class' => 'btn btn-success']) */?>
    </p>
        <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'apellido',
            'cedula',
            'telefono1',
             'telefomo2',
             'direccion',
             'cargo',
             'notas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        <?php Pjax::end(); ?>

</div>
<p>

            <?= Html::a('Registrar empleado', ['create'], ['style'=> 'font-weight:600']) ?>

</p>