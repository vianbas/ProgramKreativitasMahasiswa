<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\proposal\ProposalFile */

$this->title = 'Update Proposal File: ' . ' ' . $model->id_proposal_revision;
$this->params['breadcrumbs'][] = ['label' => 'Proposal Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_proposal_revision, 'url' => ['view', 'id' => $model->id_proposal_revision]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proposal-file-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
