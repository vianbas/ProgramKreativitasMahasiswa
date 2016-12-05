<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Announcement */

$this->title = $model->topic;
$this->params['breadcrumbs'][] = ['label' => 'Announcements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announcement-view">
<div class="container">
      <section class="invoice">
        <div class="box box-widget">
            <div class='box-header with-border'>
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-info-circle "></i> <?= $model->topic ?>
                            <small class="pull-right">Date: 2/10/2014</small>
                        </h2>
                    </div><!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">            
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <div class="col-md-12"> <?= $model->description?> </div>
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">

                    </div><!-- /.row -->
                    <!-- this row will not appear when printing -->
                         
                </div>
                
            </div>
                                    <div class="col-md-12">
                       <?=
                       yii\widgets\ListView::widget([                                
                                'dataProvider' => $file,
                                'itemOptions' => ['class' => 'item'],
                                'itemView' => 'view_file',
                                'summary'=>'',
                            ])
                            ?> 
                        </div><!-- accepted payments column -->
            
    </section><!-- /.content -->
    

</div>
</div>
