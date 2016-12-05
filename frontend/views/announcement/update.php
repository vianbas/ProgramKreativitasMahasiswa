<?php

use yii\helpers\Html;
use yii\gii\generators\form;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model frontend\models\Announcement */

$this->title = 'Update Announcement: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Announcements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="announcement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
