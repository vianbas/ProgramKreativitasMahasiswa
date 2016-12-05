<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\proposal\ProposalFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proposal Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proposal-file-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Proposal File', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->id_proposal_revision), ['view', 'id' => $model->id_proposal_revision]);
        },
    ]) ?>

</div>
