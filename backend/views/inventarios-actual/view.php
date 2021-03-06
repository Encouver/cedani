<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InventariosActual */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inventarios Actuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventarios-actual-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'producto_id' => $model->producto_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'producto_id' => $model->producto_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'producto_id',
            'cantidad',
        ],
    ]) ?>

</div>
