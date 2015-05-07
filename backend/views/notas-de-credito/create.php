<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NotasDeCredito */

$this->title = 'Create Notas De Credito';
$this->params['breadcrumbs'][] = ['label' => 'Notas De Creditos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notas-de-credito-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
