<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
?>
<div class="col-md-4 no-border">  
    <div class="box box-primary no-border no-shadow collapsed-box">
        <div class="box-header with-border collapsed-box">
           <?= Html::a('<img class="profile-user-img img-responsive img-circle" src="category/'.$model->id.'.png" alt="User profile picture">'
                   . ''
                   . '<center> <b>'.$model->category_name.'</b>   
            </center>',['category/category','id'=>$model->id])?>             
            <div class="box-tools pull-right">         
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            </div>   
        </div>   
        <div class="box-body box-profile">        
            <?= $model->public_description ?>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!-- /.box -->
<div class="JustifyFull">
</div><!-- /.col -->