<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\proposalRevision\ProposalRevision */

$this->title = 'Create Proposal Revision';
$this->params['breadcrumbs'][] = ['label' => 'Proposal Revisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proposal-revision-create">
<div class="container">
    <section class="invoice">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</section>
</div>
</div>
