<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
?>

<div class="box box-primary no-border">
    <div class="box-body box-profile">
        <h4 class="box-title"><?= Html::a('', ['user/change_password'], ['class' => 'fa fa-pencil','attribute'=>'asdas']) ?>  <?= Html::a('', ['/user/updates'], ['class' => 'fa fa-cog']) ?></h4> 
        <img class="profile-user-img img-responsive img-circle" src="<?= $model->foto ?>" alt="User profile picture">
        <h3 class="profile-username text-center"><?= $model->nama ?></h3>
        <p class="text-muted text-center"><?= $model->kpt_prodi ?></p>
        <br>
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>NIM</b> <b class="pull-right"><?= $model->nim ?></b>
            </li>
            <li class="list-group-item">
                <b>Tahun Masuk</b><b class="pull-right"><?= $model->thn_masuk ?></b>
            </li>
        </ul>
    </div><!-- /.box-body -->
</div><!-- /.box -->

<div class="box box-primary">
    <div class="box-body box-profile">        
        <ul class="list-group list-group-unbordered">

            <li class="list-group-item">
            <justify>              
                <p>
                    lorem lorem                  lorem ipsum lasdas asdabj askjdbahsk adsbhah adba ajdba ajsdba qweh ajdb  bhab asdhbas ahisbd akjsbd kajbsd kajsbd
            </justify>                     
            </li>
        </ul>
        <?= Html::a('Create new Group', ['group/reg'], ['class' => 'btn btn-primary btn-block']) ?>
    </div><!-- /.box-body -->
</div><!-- /.box -->
