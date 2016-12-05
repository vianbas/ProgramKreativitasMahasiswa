<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Groups';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="group-index">
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>    
    <div class="col-md-9">
    <div class="pad box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">All Group</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
             <!--   <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
            </div>
            
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">            
            <div class="table-responsive">
                <div class="col-md-4">
                    
                        <?= $this->render('_search.php',['model'=>$searchModel]) ?>
                        
                        <br>
                        <br>
           </div>
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Group Name</th>
                            <th>Year</th>
                        </tr>
                    </thead>
                    <tbody>                        
                            <?=
                            ListView::widget([
                                'dataProvider' => $dataProvider,
                                'itemOptions' => ['class' => 'item'],
                                'itemView' => 'view_group',
                                'summary'=>'',
                            ])
                            ?>                                                                           
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.box-body -->
        
    </div>
    </div>
    <div class="col-md-3">
         <?= $this->render('profile.php') ?>
         <?= $this->render('profile_1.php') ?>
         <?= $this->render('profile_2.php') ?>
    </div>
        
    <!-- /.box -->
</div>

