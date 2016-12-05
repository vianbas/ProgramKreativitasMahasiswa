<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\category\Category;

/* @var $this yii\web\View */
/* @var $model frontend\models\AnnouncementSearch */
/* @var $form yii\widgets\ActiveForm */

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'template' => "{input}<span class='fa fa-search form-control-feedback'></span>"
];
?>

<div class="announcement-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    <?=
            $form
            ->field($model, 'group_name', $fieldOptions1)
            ->label('Search Announcement Title')
            ->textInput(['placeholder' => "search group name"])
    ?>        
    <?php // echo $form->field($model, 'start_date')   ?>


<?php ActiveForm::end(); ?>

</div>
