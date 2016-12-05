<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model common\models\Account */
/* @var $form yii\widgets\ActiveForm */

$this->title = "Change Password";

?>

<div class="account-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($user, 'currentPassword')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($user, 'newPassword')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($user, 'newPasswordConfirm')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Submit',['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
