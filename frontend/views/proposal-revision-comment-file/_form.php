<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\proposalRevision\ProposalRevisionCommentFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proposal-revision-comment-file-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_p_r_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
