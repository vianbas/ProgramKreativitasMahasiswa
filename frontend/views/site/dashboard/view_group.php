<?php

use yii\helpers\Html;
?>  
<tr>
    <td> <?= Html::a($model->id, ['group/view', 'id' => $model->id])?></td>
    <td> <?= Html::a($model->group_name, ['group/view', 'id' => $model->id])?></td>
    <td> <?= $model->year ?></td>
    <td><div class="sparkbar" data-color="#00a65a" data-height="20"> <?= $model->Description ?></div></td>
</tr>


