<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\modules\forum\models\Forum */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Forums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-view">
    <div class="container">
        <div class="primary content clearfix">
            <div class="box no-margin no-border">               
                <div class="primary-content clearfix"> 
                    <div class="col-md-12"> 
                        <div class="inline-headers active">
                            <h3>Forum <?= $model->title ?></h3> 
                            <?= yii\helpers\Html::a('New Thread', ['thread/create-thread', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                            <?= yii\helpers\Html::a('Back to ' . $model->forumss->title, ['forum/forums'], ['class' => 'btn btn-danger btn-sm']) ?>
                        </div> 
                        <p></p> 
                        <div class="well"> 
                            <p><?= $model->description ?></p> 
                        </div> 
                        <h3>Threads</h3>                     
                        <div class="clearfix">
                        </div> 
                        <div class="panel panel-default"> 
                            <div class="panel-heading"> 
                                <div class="clearfix row"> 
                                    <div class="col-xs-4"> 
                                        <small>Thread</small> 
                                    </div> 
                                    <div class="col-xs-2"> 
                                        <small>Author</small> 
                                    </div> 
                                    <div class="col-xs-1"> 
                                        <small>Views</small>
                                    </div> 
                                    <div class="col-xs-1"> 
                                        <small>Replies</small> 
                                    </div> 
                                    <div class="col-xs-2"> 
                                        <small>Last post</small> 
                                    </div> <div class="col-xs-2"> 
                                        <small>Last post by</small> 
                                    </div> 
                                </div> 
                            </div> 
                            <div class="panel-body"> 
                                <div class="clearfix row"> 
                                    <?=
                                    ListView::widget([
                                        'dataProvider' => $dataProvider,
                                        'itemOptions' => ['class' => 'item'],
                                        'itemView' => '_view_thread',
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
