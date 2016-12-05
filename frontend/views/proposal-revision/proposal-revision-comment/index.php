<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\bootstrap\Modal;

$this->params['breadcrumbs'][] = ['label' => 'Proposal Revisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'template' => "{input}<span class='fa  fa-comments-o form-control-feedback'></span>"
];

?>
<div class="proposal-revision-view">
    <section class="invoice">
        <div class="box box-widget">
            <div class='box-header with-border'>
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa  fa-file-pdf-o">  </i>  <?= $model->idCategory->category_name . ' ' . $model->topic ?>
                            <small class="pull-right">Date: 2/10/2014</small>
                        </h2>
                    </div><!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">            
                    <!-- Table row -->
                    
                    <div class="row">
                        <!-- accepted payments column -->
                    </div><!-- /.row -->
                    <!-- this row will not appear when printing -->
                  

                </div>           
            </div>           
            <div class='box-footer box-comments'>

                <?=
                ListView::widget([
                    'dataProvider' => $dataProviderComment,
                    'itemOptions' => ['class' => 'item'],
                    'itemView' => 'view_comment',
                ])
                ?>       

            </div><!-- /.box-footer -->

            <?=
            $this->render('_formcomment', [
                'model' => $newcomment,
                'id'=>$model->id,
            ])
            ?>

    </section><!-- /.content -->


    <!-- Main content -->
</div>
