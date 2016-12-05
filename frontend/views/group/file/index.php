<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\grid\GridView;
?>
<div class="box-body no-padding no-margin">              
    <table class="table table-bordered">
        <tr>
            <th style="width: 10px">#</th>
            <th>Proposal</th>
            <th>description</th>
            <th style="width: 40px">uploaded By</th>
            <th style="width: 40px">time</th>
        </tr>
        <?=
        ListView::widget([
            'dataProvider' => $proposalRevision,
            'itemOptions' => ['class' => 'item'],
            'itemView' => '_view',
            'summary' => '',
        ])
        ?>       
    </table>    
</div><!-- /.box -->
