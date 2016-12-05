<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\proposalRevision\ProposalRevisionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proposal-revision-search">

    <?php $form = ActiveForm::begin([
        'action' => ['view'],
        'method' => 'post',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_proposal') ?>

    <?= $form->field($model, 'topic') ?>

    <?= $form->field($model, 'id_category') ?>

    <?= $form->field($model, 'abstraction') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'due_date') ?>

    <?php // echo $form->field($model, 'finalization') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
