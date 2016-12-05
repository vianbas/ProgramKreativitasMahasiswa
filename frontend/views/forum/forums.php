<?php
$this->title = 'Forum';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="primary-content clearfix"> 
    <div class="container"> 
        <section class="invoice"> 
        <h2>Forums</h2>
        <?php foreach ($dataProvider as $dataProvider) {
        if ($dataProvider->parent_id == NULL) {
           $first = false;
            ?>
        <div class="panel panel-default">
            <div class="panel-heading clearfix"> 
                <div class="pull-left"> 
                    <h3 class="panel-title"><a href="/forums/1"><?= $dataProvider->title ?></a></h3> 
                </div> 
            </div> 
            <div class="panel-body">
                 <?php foreach ($dataProvider->forums as $dataProviders) { ?>                
                <?php if($first){ ?>
                <div class="row"> 
                        <hr class="forum-divider"> 
                </div>
                <?php }else{  $first = true;} ?>
                
                <div class="clearfix"> 
                    <div class="pull-right"> 
                        <small>Last post: uptimist @ <time class="display-time" datetime="2016-04-23T05:44:17.325Z" title="23-Apr-2016 12:44:17 +07:00">5 days ago</time> </small> 
                    </div> 
                    <div> 
                        <h4><a href="/forums/2"><?= \yii\helpers\Html::a($dataProviders->title, ['view', 'id' => $dataProviders->id])?> </a></h4> 
                        <p>
                            <small></small>
                        </p>
                        <p><small><?= $dataProviders->description ?> </small></p><small> </small><p></p> 
                    </div>                   
                </div>                  
                 <?php } ?>
            </div> 
        </div>
        <?php }
        
        }?>
    </div> 
</div>