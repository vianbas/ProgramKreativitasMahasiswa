<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="post-reply">
<?php $form = ActiveForm::begin(); ?>

        <?=
    \yii\widgets\ListView::widget([
                                        'dataProvider' => $posts,
                                        'itemOptions' => ['class' => 'item'],
                                        'itemView' => '_view_post',
                                        'summary' => '',
                                    ])
                                    ?>     
    
    <?php 
        echo '<h3> Re '.$post->thread->subject.'</h3>';  
    ?>
    

     <?=
                            $form->field($model, 'content')->widget(\dosamigos\ckeditor\CKEditor::className(), [
                                'options' => ['rows' => 10],
                                'preset' => 'basic'
                            ])
                            ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Add Post' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>    

    <?php ActiveForm::end(); ?>
    </div>