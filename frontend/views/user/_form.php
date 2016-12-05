<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'file')->fileInput() ?>
    <?php if($model->foto){
     echo '<img src="'.$model->foto.'" width="90px">';
     //echo Html::a('Delete Photo',['deletefoto','id'=>$model->id],['class'=>'btn btn-danger']).'<p>';
    } ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
