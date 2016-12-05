<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\category\CategoryInformation */

$this->title = 'Update Category Information: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Category Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-information-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
