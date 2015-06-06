<?php
/* @var $this yii\web\View */
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Administración CEDANI';
?>
<div class="site-index">
    <div class="panel panel-default">
      <div class="panel-body">
            <p>
            <img src="<?= Yii::getAlias('@web').'/img/logo.png'?>" class="logo" width="200px"/>
            </p>
            <hr>
        <div class="row">
          <div class="col-xs-6 col-md-4">
              <h4><i class="ion ion-document-text"></i>
              <?= Html::a("&nbsp;&nbsp;Facturación", Url::toRoute('facturas/index')); ?></h4>
              <h4><i class="ion ion-cash"></i>
              <?= Html::a("&nbsp;&nbsp;Cobranza", Url::toRoute('cobranzas/index')); ?></h4>
              <h4><i class="ion ion-android-clipboard"></i>
              <?= Html::a("&nbsp;&nbsp;Inventario", Url::toRoute('inventarios/index')); ?></h4>
              <h4><i class="ion ion-stats-bars"></i><?= Html::a("&nbsp;&nbsp;Ventas", Url::toRoute('ventas/index')); ?></h4>

          </div>
          <div class="col-xs-6 col-md-4">
              <h4><i class="ion ion-person"></i><?= Html::a("&nbsp;&nbsp;Clientes", Url::toRoute('clientes/index')); ?></h4>
              <h4><i class="ion ion-cube"></i><?= Html::a("&nbsp;&nbsp;Productos", Url::toRoute('productos/index')); ?></h4>
              <h4><i class="ion ion-bag"></i><?= Html::a("&nbsp;&nbsp;Proveedores", Url::toRoute('proveedores/index')); ?></h4>
              <h4><i class="ion-person-stalker"></i><?= Html::a("&nbsp;&nbsp;Empleados", Url::toRoute('empleados/index')); ?></h4>
          </div>
          <div class="col-xs-6 col-md-4">
              <h4><i class="ion ion-compose"></i><?= Html::a("&nbsp;&nbsp;Agenda", Url::toRoute('tareas/index')); ?></h4>
              <h4><i class="ion ion-android-warning"></i>&nbsp;&nbsp;Configuración</h4>

          </div>
        </div>

        <?php 
        /*
            NavBar::begin(['brandLabel' => '']);
            echo Nav::widget([
                'items' => [
                    ['label' => 'Clientes', 'url' => ['/clientes/index']],
                    ['label' => 'Productos', 'url' => ['/productos/index']],
                    ['label' => 'Tareas', 'url' => ['/tareas/index']],
                    ['label' => 'Empleados', 'url' => ['/empleados/index']],
                    ['label' => 'Configuraciones', 'url' => ['/coniguraciones/index']],
                    ['label' => 'Productos Proveedores', 'url' => ['/productos-proveedores/index']],
                    ['label' => 'Inventarios', 'url' => ['/inventarios/index']],
                    ['label' => 'Histórico de precios', 'url' => ['/historico-precios/index']],
                    ['label' => 'Nótas de Crédito', 'url' => ['/notas-de-credito/index']],
                    ['label' => 'Cobranzas', 'url' => ['/cobranzas/index']],
                    ['label' => 'Entregas', 'url' => ['/entregas/index']],
                    ['label' => 'Facturas', 'url' => ['/facturas/index']],
                    ['label' => 'Compras', 'url' => ['/compras/index']],
                    ['label' => 'Proveedores', 'url' => ['/proveedores/index']],

                ],
            ]);
            NavBar::end();
        */
        ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
              <div class="panel-heading">Agenda</div>

              <div class="panel-body">
              AQUI VA UN PREVIEW DE LA AGENDA
              </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-default">
              <div class="panel-heading">Cualquier otra cosa</div>
              <div class="panel-body">

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
              </div>
            </div>
        </div>

    </div>

</div>

