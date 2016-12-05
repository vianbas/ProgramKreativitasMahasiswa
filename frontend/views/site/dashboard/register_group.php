<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <div class="login-logo">        
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">register / <a href="index.php?r=site/login" class="text-center">Login</a> to start your session</p>
        
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <?= $form->field($model, 'group_name') ?>
        <?= $form->field($model, 'year') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'supervisior') ?>
        <?= $form->field($model, 'member') ?>
         <div class="row">

         </div>
        <div class="row">           
            <!-- /.col -->
            <div class="col-xs-4">
            <button type="button" class="remove-house btn btn-danger btn-xs"><span class="fa fa-minus"></span></button>    
            <?= Html::submitButton('Register', ['class' => 'btn btnprimary', 'name' => 'signup-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>
        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>