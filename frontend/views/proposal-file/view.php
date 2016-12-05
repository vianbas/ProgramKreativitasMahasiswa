<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\proposal\ProposalFile */

$this->title = $model->id_proposal_revision;
$this->params['breadcrumbs'][] = ['label' => 'Proposal Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proposal-file-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_proposal_revision], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_proposal_revision], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_proposal_revision',
            'file_location',
            'uploaded_at',
        ],
    ]) ?>

</div>
