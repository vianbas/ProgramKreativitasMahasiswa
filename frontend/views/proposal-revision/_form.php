<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model common\models\proposalRevision\ProposalRevision */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proposal-revision-form">
   
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'topic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_category')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\category\Category::find()->asArray()->all(), 'id', 'category_name'), ['prompt'=>'-Choose a Category-']) ?>                      

     <?= $form->field($model, 'abstraction')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
    
     <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
    
    

    <?php $form->field($model, 'start_date')->textInput() ?>

    <?php $form->field($model, 'due_date')->textInput() ?>

    <?php $form->field($model, 'finalization')->textInput() ?>
    
    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
       

    <?php ActiveForm::end(); ?>

</div>
