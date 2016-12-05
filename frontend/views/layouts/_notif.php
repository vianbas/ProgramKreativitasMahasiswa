<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;

?>
<li class="body-content" style="background-color:<?php if($model->seen==0 ){ ?> lightcyan <?php }else{?> <?php }?>">
    <?= Html::a($model->key,['notification/notif','id'=>$model->id,'key_id'=>$model->key_id,'type'=>$model->type]); ?>
</li>