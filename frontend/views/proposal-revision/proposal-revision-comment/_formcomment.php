<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



$user = common\models\User::findOne(Yii::$app->user->id);

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'template' => "{input}<span class='fa  fa-comments-o form-control-feedback'></span>"
];
?>



<?php
$form = ActiveForm::begin([
            'action' => ['view', 'id' => $id],
            'method' => 'post',
        ]);
?>

<div class="box-footer">
    <form action="#" method="post">
        <img class="img-responsive img-circle img-sm" src="<?=$user->members->foto?>" alt="alt text">
        <!-- .img-push is used to add margin to elements next to floating images -->
        <div class="img-push">
            <?=
                    $form
                    ->field($model, 'comments', $fieldOptions1)
                    ->label('("Press enter to post comment')
                    ->textInput(['placeholder' => "Press enter to post comment"])
            ?>    
        </div>
    </form>
</div><!-- /.box-footer -->

<?php ActiveForm::end(); ?>