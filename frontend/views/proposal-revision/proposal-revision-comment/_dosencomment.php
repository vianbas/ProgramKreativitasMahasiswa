<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use kartik\file\FileInput;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'template' => "{input}<span class='fa  fa-comments-o form-control-feedback'></span>"
];
?>
<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

<div class="box-footer"> 
    <form action="#" method="post">
        <div class="img-push">         
            <?=
                $form->field($model, 'comments', $fieldOptions1)
                     ->label('Press enter to post comment')
                     ->textarea(['placeholder' => "Press enter to post comment",'rows'=>10])
            ?>       
        </div>        
    </form>
</div>
<?php ActiveForm::end(); ?>
<form>
    <center>
        <?= Html::submitButton('Reject', ['class' => 'btn btn-danger']) ?>
    </center>
</form>
