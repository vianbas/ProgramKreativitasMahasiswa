<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\proposalRevision\ProposalRevisionCommentFile */

$this->title = 'Update Proposal Revision Comment File: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Proposal Revision Comment Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proposal-revision-comment-file-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
