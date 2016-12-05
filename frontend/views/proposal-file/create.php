<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\proposal\ProposalFile */

$this->title = 'Create Proposal File';
$this->params['breadcrumbs'][] = ['label' => 'Proposal Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proposal-file-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
