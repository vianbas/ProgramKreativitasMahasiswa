<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AnnouncementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="announcement-view">
    <div class="container">  
        <section class="invoice no-margin">
            <div class="box box-widget">
                <div class='box-header with-border'>
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-info-circle "></i> Announcement
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-md-4">

                            <?= $this->render('_search.php', ['model' => $searchModel]) ?>

                            <?php if (Yii::$app->user->can('supervisior')) { ?>   
                                <?= Html::a('  Create new Announcement', ['create'], ['class' => 'btn btn-success fa fa-plus']) ?> 
                            <?php } ?>
                            <br>
                            <br>
                        </div>
                        <!-- Table row -->

                        <div class="col-xs-12">
                            <table class="table table-striped">
                                <?=
                                yii\grid\GridView::widget([
                                    'dataProvider' => $dataProvider,
//                        'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        [
                                            'attribute' => 'topic',
                                            'format' => 'raw',
                                            'value' => function($model) {
                                                return Html::a($model->topic, ['announcement/view', 'id' => $model->id]);
                                            }
                                        ],
                                                'start_date',
                                                [
                                                      'attribute' => ' ',
                                        'format'=>'raw',
                                        'value'=>function($model){
                                        return Html::a('<button class="btn btn-success btn-xs">update</button>',['update', 'id' => $model->id]);                                
                                      }
                                                ]
                                          ],
                                        ]);
                                        ?>

                            </table>
                        </div><!-- /.col -->
                        <!-- /.row -->
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
    </div>
</div>

