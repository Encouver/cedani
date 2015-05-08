<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InventariosActual */

$this->title = 'Create Inventarios Actual';
$this->params['breadcrumbs'][] = ['label' => 'Inventarios Actuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventarios-actual-create">
    <div class="col-md-6">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	</div>
</div>
