<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\widgets\ListView;
use yii\helpers\Html;
?>
<div class="box box-primary no-border">
    <div class="box-header"><center><h4><i class="fa fa-link"></i> Link</h4></center></div>                
    <!-- form start -->
    <form role="form">
        <div class="box-body">
            <ul>
                <li><a href="http://simlitabmas.dikti.go.id/">Dikti</a></li>
                <li><?= Html::a('Pedoman Dikti 2015',['site/download']) ?></li>
            </ul>
        </div>
    </form>
</div>
<br>
<br>
