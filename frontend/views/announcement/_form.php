<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\category\Category;
use yii\bootstrap\Modal;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'template' => "{input}<span class='fa  fa-comments-o form-control-feedback'></span>"
];

/* @var $this yii\web\View */
/* @var $model frontend\models\Announcement */
/* @var $form yii\widgets\ActiveForm */
/* <?= $form->field($model, 'user_id')->textInput() ?> di dalam form */
?>

<div class="announcement-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <section class="invoice">
        <div class="box box-widget">
            <div class='box-header with-border'>                
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-info-circle "></i> Create New Announcement

                        </h2>
                    </div><!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">

                    <!-- Table row -->

                    <div class="col-xs-12">
                        <table class="table table-striped">
                            <?= $form->field($model, 'topic')->textInput(); ?>

                            <?= $form->field($model, 'id_category')->dropDownList(ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'category_name'), ['prompt' => '-Choose a Category-']) ?>


                            <?=
                            $form->field($model, 'description')->widget(CKEditor::className(), [
                                'options' => ['rows' => 10],
                                'preset' => 'full'
                            ])
                            ?>

                            <?=
                            $form->field($model, 'file[]')->widget(FileInput::classname(), [
                                'options' => ['multiple' => 'true', 'rows' => 1],
                                'pluginOptions' => [
                                    'uploadUrl' => Url::to(['/upload/announcement']),
                                    'showUpload' => true,
                                    'browseLabel' => 'Browse File'
                                ],
                            ])
                            ?>

                            


                <?php $form->field($model, 'start_date')->textInput() ?>

                </table>
            </div><!-- /.col -->
            <!-- /.row -->
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <div class="row">
                <!-- accepted payments column -->
            </div><!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-11 pull-right">

                </div>
            </div>           

        </div>           
</div>                 
</section><!-- /.content -->  
<?php ActiveForm::end(); ?>
</div>
