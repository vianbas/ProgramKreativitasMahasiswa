<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <!-- /.login-logo -->  
    <div class="box color-palette-set box-solid">
        <div class="box-header with-border">
            <center><h3 class="box-title">Login</h3></center>
        </div><!-- /.box-header -->
        <div class="box-body">
            <center>
                <img src="logo/pkm.png" style="height:265px; ">
            </center>
            <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

            <?=
                    $form
                    ->field($model, 'username', $fieldOptions1)
                    ->label(false)
                    ->textInput(['placeholder' => $model->getAttributeLabel('username')])
            ?>

            <?=
                    $form
                    ->field($model, 'password', $fieldOptions2)
                    ->label(false)
                    ->passwordInput(['placeholder' => $model->getAttributeLabel('password')])
            ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            <?php ActiveForm::end(); ?>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
