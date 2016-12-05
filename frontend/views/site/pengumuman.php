<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ListView;
?>
<div class="box box-primary no-border" style="height: 442px">
    <div class="box-header"><center><h4><i class="fa fa-info-circle"></i>Announcement</h4></center></div>                
    <!-- form start -->
    <form role="form">
        <div class="box-body">
            <?=
            ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'summary' => '',
                'itemView' => 'announcement.php',
            ])
            ?>
        </div>
    </form>
    <div class="box-footer text-center">
        <?= Html::a('View All Announcement', ['announcement/index']) ?>
    </div><!-- /.box-footer -->
</div>     