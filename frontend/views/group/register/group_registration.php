<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use common\models\category\Category;
use kartik\select2\Select2;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <div class="login-logo">        
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">register / <a href="index.php?r=site/login" class="text-center">Login</a> to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
        <?= $form->field($model, 'group_name') ?>
        <?= $form->field($model, 'year') ?>
        <?= $form->field($model, 'Description')->textarea(['height' => 1000]) ?>
        <?= $form->field($model, 'supervisior') ?>
        <?= $form->field($model, 'category')->dropDownList(\yii\helpers\ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'category_name'), ['prompt' => '-Choose a Category-']) ?>                 
        <?php
        DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 3, // the maximum times, an element can be cloned (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $modelMember[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'id_students',
                'id_group',
            ],
        ]);
        ?>
        <?php
        $data = \yii\helpers\ArrayHelper::map(common\models\students\Students::find()->asArray()->all(), 'nim', 'nama');

// Tagging support Multiple
        echo '<label class="control-label">Tag Multiple</label>';
        echo Select2::widget([
            'model' => $modelMember[0],
            'name' => 'color_1',
            'data' => $data,
            'options' => ['placeholder' => 'Select a color ...', 'multiple' => true],
            'pluginOptions' => [
                'tags' => true,
                'maximumInputLength' => 3
            ],
        ]);
        ?> 


        <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelMember as $i => $modelsMember): ?>
                <div class="item"><!-- widgetBody -->                    

                    <div class="panel-body">
                        <?php
                        // necessary for update action.
                        if (!$modelsMember->isNewRecord) {
                            echo Html::activeHiddenInput($modelsMember, "[{$i}]id");
                        }
                        ?>
                        <div class="row">
                            <?= $form->field($modelsMember, "[{$i}]id_students")->textInput(['maxlength' => 128]) ?>                            
                        </div><!-- .row -->
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php DynamicFormWidget::end(); ?>       

        <div class="row">           
            <!-- /.col -->
            <div class="col-xs-8 pull-right">
                <?= Html::submitButton('Register', ['class' => 'btn btnprimary', 'name' => 'signup-button']) ?>
            </div>
            <!-- /.col -->
        </div>
        <?php ActiveForm::end(); ?>
        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>