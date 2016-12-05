<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ListView;
?>
<div class="col-md-5 no-padding">
    <div class="box box-primary no-border">
        <div class="box-body">
            <?= $this->render('lastest_proposal_upload', ['dataProvider' => $dataProviderProposal]) ?>         
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="box box-primary no-border">
        <div class="box-body">
            <?= $this->render('lastest_post', ['dataProvider' => $dataProviderPost]) ?>
        </div>
    </div>
</div>
<div class="col-md-3 no-padding pull-right">
    <div class="box box-primary no-border">
        <div class="box-body">
            <?= $this->render('link', ['dataProvider' => $dataProviderProposal]) ?>         
        </div>
    </div>
    <br>
    <div class="box box-primary no-border">
        <div class="box-body">
            <?= $this->render('create_group', ['dataProvider' => $dataProviderProposal]) ?>         
        </div>
    </div>
</div>