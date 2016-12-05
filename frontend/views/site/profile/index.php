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
        <div class="col-md-9"> 
            <div class="row">
                <div class="col-md-12">
                    <?= $this->render('group.php', ['dataProvider' => $dataProvider]) ?>
                    <?php
                    if (Yii::$app->user->can('supervisior')) {
                        
                    } else if (!Yii::$app->user->isGuest) {
                        ?>
                        <?= $this->render('create_group.php', ['dataProvider' => $dataProvider]) ?>
                    <?php } ?>
                </div>
            </div>   
        </div>
        <div class="col-md-3">
            <?php
            if (Yii::$app->user->can('supervisior')) {
                
            } else if (!Yii::$app->user->isGuest) {
                ?>
                <?= $this->render('profile.php', ['dataProvider' => $dataProvider, 'model' => $model]) ?>
            <?php } ?>
        </div>
    </div>
</div>


