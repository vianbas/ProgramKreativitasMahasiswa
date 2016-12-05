<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$count = 0;
$models = $model->post;
if($models !=NULL){
 $count+=1;   
while($models->parent_id !=NULL){
    $count+=1;
    $models = $models->post;
   }
}
?>

<section class="invoice no-border no-padding">
<div class="clearfix">
  <div class="post-wrapper-<?= $count?>">
    <div class="panel panel-default post">      
        <div class="clearfix"></div> 
        <div class="panel-heading clearfix"> 
            <div class="pull-left"> 
                <span class="panel-title"><?php
                    if ($model->parent_id == NULL) {
                        echo $model->thread->subject;
                    } else {
                        echo 'Re : ' . $model->thread->subject.' response to Post by '.$model->post->author->members->nama;
                    }
                    ?></span> | <?= yii\helpers\Html::a('reply', ['post/reply', 'thread_id' => $model->thread_id, 'parent_id' => $model->id,'id'=>$model->id]) ?> 
            </div> 
            <div class="pull-right"> 
                <time class="display-time" datetime="2015-10-24T14:14:36.922Z" title="24-Oct-2015 21:14:36 +07:00"><?=$model->created ?></time> 
            </div> 
        </div> 
        <div class="panel-body post-body">
            <div class="clearfix"> 
                <div class="user col-xs-2"> 
                    <img src="<?= $model->author->members->foto ?>" width="100" height="100" class="user-image img-circle" alt="User Image"/>                                            
                    <div class="text-center">@ <?= $model->author->members->nama ?></div> 
                </div> 
                <div class="col-xs-10 post-content content-text"> 
                    <?= $model->content ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<br>




