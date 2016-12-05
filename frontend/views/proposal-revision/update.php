<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\proposalRevision\ProposalRevision */

$this->title = 'Update Proposal Revision: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Proposal Revisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proposal-revision-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
