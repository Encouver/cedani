<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
 <!--   <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>
-->
        <?= Html::img('@web/img/logo.png', ['width'=>'200px', 'style'=>'margin-top:100px;margin-bottom:25px']);?>


            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput([])->label('Usuario',[]) ?>

                <?= $form->field($model, 'password')->passwordInput()->textInput([])->label('Contraseña',[]) ?>
                <?= $form->field($model, 'rememberMe')->checkbox()->label('Recordarme') ?>
                <div class="form-group">
                    <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
