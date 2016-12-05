<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="panel panel-default post"> 
    <div class="clearfix"></div> 
    <div class="panel-heading clearfix"> 
        <div class="pull-left"> 
            <span class="panel-title">
        <?= $model->thread->subject ?></span> 
        </div> 
        <div class="pull-right"> 
            <a href="/posts/189/versions">1 Edit</a> | <time class="display-time" datetime="2015-10-24T14:14:36.922Z" title="24-Oct-2015 21:14:36 +07:00">6 months ago</time> </div> 
    </div> 
    <div class="panel-body post-body">
        <div class="clearfix"> 
            <div class="user col-xs-2"> 
                <img src="<?=$model->author->members->foto?>" width="100" height="100" class="user-image img-circle" alt="User Image"/>                                            
                <div class="text-center">   <?= $model->author->members->nama ?></div> 
            </div> 
            <div class="col-xs-10 post-content content-text"> 
                <?= $model->content ?>
            </div>
        </div>
    </div>
</div>