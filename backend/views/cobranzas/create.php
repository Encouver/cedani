<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cobranzas */

$this->title = 'Nueva cobranza';
$this->params['breadcrumbs'][] = ['label' => 'Cobranzas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cobranzas-create">

    <h2><?= Html::encode($this->title) ?></h2>
    
    <div class="col-lg-6">

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
    </div>
</div>
