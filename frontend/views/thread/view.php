<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\modules\forum\models\Thread */

$this->title = $model->subject;
$this->params['breadcrumbs'][] = ['label' => 'Threads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thread-view">



    <?php Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?php
    Html::a('Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ])
    ?>

    <?php
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'forum_id',
            'subject',
            'is_locked',
            'view_count',
            'created',
        ],
    ])
    ?>
</div>


<div class="forum-view">    
    <div class="primary content clearfix">
            <div class="container">    
        <div class="col-xs-12 pull-right">
            <div class="box no-margin no-border">            
                <div class="primary-content clearfix"> 
                    <div class="col-md-12"> 
                        <div class="inline-headers active">
                            <br> <?=
                            Html::a('<i class="fa fa-backward"></i> Back to Forum '. $model->forum->title, ['forum/view', 'id' => $model->forum_id], [
                                'class' => 'btn btn-danger',
                            ])
                            ?>
                        </div> 
                        <h3>Posts</h3>                     
                        <div class="clearfix">
                        </div> 
                        <div class="panel panel-default">                             
                            <div class="panel-body">  
                                    <?=
                                    ListView::widget([
                                        'dataProvider' => $dataProvider,
                                        'itemOptions' => ['class' => 'item'],
                                        'itemView' => '_view_post',
                                        'summary' => '',
                                    ])
                                    ?>            
                            </div> 
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
</div>