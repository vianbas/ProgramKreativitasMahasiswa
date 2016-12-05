<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;

?>
<tr role="row" class="odd" style="background-color:<?php if($model->seen==0 ){ ?> lightcyan <?php }else{?> <?php }?>">    
    <td class=""><?= Html::a($model->key,['notif','id'=>$model->id,'key_id'=>$model->key_id,'type'=>$model->type]); ?> <?= $model->created_at ?></td>
</tr>