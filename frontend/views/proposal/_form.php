<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\proposal\Proposal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proposal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_category')->textInput() ?>

    <?= $form->field($model, 'id_group')->textInput() ?>

    <?= $form->field($model, 'abstaction')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'finalization')->textInput() ?>

    <?= $form->field($model, 'pkm_dikti')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
