<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\widgets\ListView;
use yii\helpers\Html;
?>
<div class="box box-primary no-border" style="height: 155px">
    <div class="box-header">Create Your Group to join PKM</div>                
    <!-- form start -->
    <form role="form">
        <div class="box-body">
<?= Html::a('Create new Group', ['group/register'], ['class' => 'btn btn-primary btn-block']) ?>
        </div>
    </form>
</div>     
