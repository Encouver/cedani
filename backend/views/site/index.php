<?php
/* @var $this yii\web\View */
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;

$this->title = 'Administración CEDANI';
?>
<div class="site-index">

    <div class="jumbotron">
    <!--
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    -->
    </div>



    <?php 
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

    ?>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
