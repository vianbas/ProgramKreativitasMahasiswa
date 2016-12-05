<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
?>
<tr>
<?php if ($model != null) { ?>
        <td>1.</td>
        <td>
            <?= Html::a($model->topic . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', ['proposal-revision/view', 'id' => $model->id]); ?>
    <?php if (!Yii::$app->user->isGuest) {
        echo Html::a('<i class="fa fa-download">Download</i>', ['proposal-revision/download', 'nama' => $model->tpkmProposalRevisionFile->file_location]);
    } ?>
        </td>    
        <td><?= $model->description ?></td>
        <td><?= $model->tpkmProposalRevisionFile->userupload->username ?></td>
        <td><?= $model->tpkmProposalRevisionFile->uploaded_at ?></td>
<?php } ?>
</tr>
