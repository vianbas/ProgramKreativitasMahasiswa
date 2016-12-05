<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\category\Category;

/* @var $this yii\web\View */
/* @var $model common\models\proposal\ProposalSearch */
/* @var $form yii\widgets\ActiveForm */

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'template' => "{input}"
];
?>

<div class="col-md-12 no-padding">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    
    <?=
            $form
            ->field($model, 'topic', $fieldOptions1)
            ->label('Search Topic')
            ->textInput(['placeholder' => "Topic"])
    ?>   

    <?=
    $form->field($model, 'id_category', $fieldOptions1)->dropDownList(ArrayHelper::map(Category::find()
                            ->asArray()
                            ->all(), 'id', 'category_name'), ['prompt' => '-All Category-'])                            
    ?>

    <?php
        $years = [
            '' => 'Year',
            2015 => "2015",
            2016 => "2016",
            2017 => "2017",
            2018 => "2018",
        ];
    ?>
    
    <?php echo $form->field($model, 'year', $fieldOptions1)->dropDownList($years) ?>

    <?php
    $data = [
        '' => 'Status',
        1 => "Final",
        2 => "Cancel",
        3 => "On Progress",
    ];
    ?>

    <?php echo $form->field($model, 'finalization', $fieldOptions1)->dropDownList($data)->label('Status') ?>
    <?php echo $form->field($model, 'group_name', $fieldOptions1)->label('Group Name')
                        ->textInput(['placeholder' => "Group Name "])?>

    <div class="form-group">
<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
<?php Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
