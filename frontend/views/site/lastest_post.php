<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\widgets\ListView;
use yii\helpers\Html;
?>
<div class="box box-primary no-border" style="height:405px">
    <div class="box-header"><center><h4><i class="fa fa-comment"></i> Latest Post</h4></center></div>                
    <!-- form start -->
    <form role="form">
        <div class="box-body">
            <?=
            ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'summary' => '',
                'itemView' => 'post.php',
            ])
            ?>
        </div>
    </form>
</div>     
