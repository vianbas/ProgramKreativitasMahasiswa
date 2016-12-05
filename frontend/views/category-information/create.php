<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\category\CategoryInformation */

$this->title = 'Create Category Information';
$this->params['breadcrumbs'][] = ['label' => 'Category Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-information-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
