<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\proposalRevision\ProposalRevisionCommentFile */

$this->title = 'Create Proposal Revision Comment File';
$this->params['breadcrumbs'][] = ['label' => 'Proposal Revision Comment Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proposal-revision-comment-file-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
