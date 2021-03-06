<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
      <br>

    <div class="col-lg-6">
            <?= Html::a('Registrar empleado', ['create'], ['class' => 'h4', 'style'=> 'font-weight:600']) ?>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
            <br>
            <?= Html::a('Consultar empleado', ['consultar'], ['class' => 'h4', 'style'=> 'font-weight:600']) ?>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
    </div>

</div>
