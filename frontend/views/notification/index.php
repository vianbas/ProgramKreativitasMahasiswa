<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\notif\NotificationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notifications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nitification-index">
    <div class="container">
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Your Notification</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">                                               
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 220px;">Notification</th>
                                        </tr>
                                    </thead>                   
                                    <tbody>
                                        <?=
                                        ListView::widget([
                                            'dataProvider' => $dataProvider,
                                            'itemOptions' => ['class' => 'item'],
                                            'itemView' => '_notif',
                                            'summary' => '',
                                        ])
                                        ?>               
                                    </tbody>  
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </section>        
    </div>
    
</div>

