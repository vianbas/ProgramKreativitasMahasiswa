<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if($model->topic!=null){
?>
<tr role="row" class="odd">    
    <td class=""><?= $model->id?></td>
    <td><?= yii\helpers\Html::a($model->topic,['group/view','id'=>$model->idGroup->id])?></td>
    <td><?= $model->idCategory->category_name?></td>
    <td class="sorting_1"><?=$model->idGroup->year ?></td>
    <td class=""><?=$model->idGroup->group_name ?></td>    
    <td class="">
        <?php if($model->finalization==0){ 
            echo '<span class="label label-warning">On Progress</span>';             
        }
        else if($model->finalization==1){
             echo '<span class="label label-success">document final</span>';
        }
        else if($model->finalization==2){
             echo '<span class="label label-danger">canceled</span>';
        }
        if($model->pkm_dikti==1){
             echo ' <span class="label label-primary"><i class="glyphicon glyphicon-tower"> Dikti</i> </span>';
        }
        ?>
    </td>
</tr>
<?php }?>