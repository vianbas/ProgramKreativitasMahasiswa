<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\proposal\ProposalFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proposal-file-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_proposal_revision')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uploaded_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
