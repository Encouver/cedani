<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Compras */

$this->title = 'Agregar Compra';

?>
<div class="compras-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProvider'=>$dataProvider,
    ]) ?>

</div>
