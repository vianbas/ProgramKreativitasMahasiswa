<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Member */

$this->title = 'Update Member: ' . ' ' . $model->nama;
?>
<div class="member-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
