<?php

use yii\helpers\Html;

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary no-border">
    <div class="box-body box-profile">
        <h4 class="box-title">
            <?= Html::a('', ['user/change_password'], ['class' => 'fa fa-pencil', 'attribute' => 'asdas']) ?>  <?= Html::a('', ['/user/updates'], ['class' => 'fa fa-cog']) ?>
        </h4>
        <img class="profile-user-img img-responsive img-circle" src="<?= $model->foto ?>" alt="User profile picture">
        <h3 class="profile-username text-center">
            <?= $model->nama ?>        
        </h3>
        <p class="text-muted text-center">
            <?= $model->kpt_prodi ?>
        </p>
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
