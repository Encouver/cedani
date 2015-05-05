<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Inventarios */

$this->title = 'Create Inventarios';
$this->params['breadcrumbs'][] = ['label' => 'Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventarios-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-lg-6">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
