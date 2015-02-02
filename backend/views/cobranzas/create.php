<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cobranzas */

$this->title = 'Create Cobranzas';
$this->params['breadcrumbs'][] = ['label' => 'Cobranzas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cobranzas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
