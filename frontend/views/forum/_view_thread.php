<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="clearfix"> 
    <div class="col-xs-4">
        <small><a href="/threads/121"><?= yii\helpers\Html::a($model->subject,['thread/view','id'=>$model->id]) ?></a></small> 
    </div> 
    <div class="col-xs-2"> 
        <small><?=$model->author->username ?></small> 
    </div> 
    <div class="col-xs-1 text-center"> 
        <small><?=$model->view_count ?></small> 
    </div> 
    <div class="col-xs-1 text-center"> 
        <small><?=$model->countPost ?></small> 
    </div> 
    <div class="col-xs-2"> 
        <small>
            <time class="display-time" datetime="2016-04-23T05:44:17.306Z" title="23-Apr-2016 12:44:17 +07:00"><?=$model->lastPost ?></time>
        </small> 
    </div> 
    <div class="col-xs-2"> 
        <small><?= $model->post ?></small> 
    </div> 
</div> 
<hr>