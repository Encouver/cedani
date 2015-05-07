<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Inventarios */

$this->title = 'Agregar productos al inventarios';
$this->params['breadcrumbs'][] = ['label' => 'Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventarios-create">
    <div class="col-md-6">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
<p>
Si no está creado el producto que desea agregar al inventario,
debe crearlo primero.

<?= Html::a('Crear producto', Url::toRoute(['productos/create']), ['style'=> 'font-weight:600']) ?>
</p>
</div>
</div>
