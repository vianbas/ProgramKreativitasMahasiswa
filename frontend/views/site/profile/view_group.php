<?php

use yii\helpers\Html;
?>  
<tr>
    <td> <?= Html::a($model->id, ['group/view', 'id' => $model->id])?></td>
    <td> <?= Html::a($model->group_name, ['group/view', 'id' => $model->id])?></td>
    <td> <?= $model->year ?></td>
    <td> <?= Html::a($model->tpkmProposal->topic, ['group/view', 'id' => $model->id]) ?></td>    

</tr>

