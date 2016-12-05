<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use common\models\category\Category;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$formatJs = <<< 'JS'
        var formatPenerima = function (penerima) {
            if (penerima.loading) {
                return penerima.id;
            }
            var markup =
            '<div class="row">' + 
                '<div class="col-sm-4">'
                    + '<b style="margin-left:5px">'
                    + penerima.Nama
                    + '</b>'
                + '</div>'
                + '<div class="col-sm-3"><i class="fa fa-phone"></i> '
                + penerima.Nim
                + '</div>'
            + '</div>';
            return '<div style="overflow:hidden;">'
                + markup
                + '</div>';
        };
        var formatPenerimaSelection = function (penerima) {
            return penerima.Nama;
        }
JS;

// Register the formatting script
$this->registerJs($formatJs, \yii\web\View::POS_HEAD);

// Script to parse the results into the format expected by Select2
$resultsJs = <<< JS
        function (data, params) {
            params.page = params.page || 1;
            return {
                results: data.results,    // check here
                /*pagination: {
                    more: (params.page * 30) < data.total_count
                }*/
            };
        }
JS;

$url = Url::to(['/group/jsonlist']);
?>
<style>
.background {
    background-image: url("image/bg1.jpg");
    background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;

}
    </style>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<div class="login-box">
    <div class="login-logo">        
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        <p class="login-box-msg">Register Group</p>
        <?php $data = \yii\helpers\ArrayHelper::map(common\models\students\Students::find()->asArray()->all(), 'dim_id', 'nama'); ?>
        <?php $supervisior = \yii\helpers\ArrayHelper::map(\common\models\pegawai\Pegawai::find()->asArray()->all(), 'pegawai_id', 'nama'); ?>


        <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
        <?= $form->field($model, 'group_name') ?>
        <?php
        echo $form->field($model, 'leader')
                ->widget(Select2::className(), [
                    'name' => 'kv-repo-template',
                    'value' => '',
                    'initValueText' => '',
                    'options' => ['placeholder' => 'Cari pemilik ...', 'id' => 'leader'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 1,
                        'ajax' => [
                            'url' => $url,
                            'dataType' => 'json',
                            'delay' => 250,
                            'data' => new JsExpression('function(params) { return {q:params.term, page: params.page}; }'),
                            'processResults' => new JsExpression($resultsJs),
                            'cache' => true
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('formatPenerima'),
                        'templateSelection' => new JsExpression('formatPenerimaSelection'),
                    ],
                ])->label('leader');
        ?>

        <?=
        $form->field($model, 'nim_user')->widget(Select2::className(), [
            'data' => $data,
            'model' => $model,
            'attribute' => 'nim_user',
            'options' => ['placeholder' => 'Pilih Anggota'],
            'pluginOptions' => [
                'allowClear' => false,
                'multiple' => true,
            ],
        ])
        ?>

        <?=
        $form->field($model, 'supervisior')->widget(Select2::className(), [
            'data' => $supervisior,
            'model' => $model,
            'attribute' => 'supervisior',
            'options' => ['placeholder' => 'Pilih Supervisior'],
            'pluginOptions' => [
                'allowClear' => false,
                'multiple' => false,
            ],
        ])
        ?>
        <?php
        $years = [
            2015 => "2015",
            2016 => "2016",
            2017 => "2017",
            2018 => "2018",
        ];
        ?>
        <?= $form->field($model, 'year')->dropDownList($years) ?>
        
                <?= $form->field($model, 'Description')->textarea(['height' => 1000]) ?>

<?= $form->field($model, 'category')->dropDownList(\yii\helpers\ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'category_name'), ['prompt' => '-Choose a Category-']) ?>                 

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


