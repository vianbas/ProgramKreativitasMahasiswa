<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\web\JqueryAsset;

JqueryAsset::className('index.php');
?>
<div class="site-index">
    <div class="container">
    <div class="row">
        <section class="invoice">
            <?= $this->render('group.php', ['dataProvider' => $dataProvider]) ?>
        </section>
    </div>  
    </div>  
</div>