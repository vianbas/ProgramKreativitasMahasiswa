<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$model = null;

$abs = \common\models\students\Students::find()->where(['user_id'=>Yii::$app->user->id]);

if($abs->count()>0){
    $model = $abs->one();
}
else{
    $model = \common\models\pegawai\Pegawai::find()->where(['user_id'=>Yii::$app->user->id])->one();
}

?>

<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="<?=$model->foto?>" class="user-image" alt="User Image">
        <span class="hidden-xs" style="padding-right: 100px"><?= $model->nama?></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="<?=$model->foto?>" class="img-circle" alt="User Image">
            <p>
                <?=$model->nama ?>    
                <small><?=$model->kpt_prodi.' '.$model->thn_masuk ?></small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="col-xs-4 text-center">
                <?= yii\helpers\Html::a('Profile',['/site/profile']); ?>
            </div>
            <div class="col-xs-4 text-center pull-right">
                <?= yii\helpers\Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post']
                                )?>
            </div>
        </li>
    </ul>
</li>