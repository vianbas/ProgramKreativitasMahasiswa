<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\modules\forum\models\Thread */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thread-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'forum_id')->hiddenInput()?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

                              <?=
                            $form->field($model, 'content')->widget(CKEditor::className(), [
                                'options' => ['rows' => 10],
                                'preset' => 'basic'
                            ])
                            ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
