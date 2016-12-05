<?php
use yii\widgets\ListView;
?>

<div class="box-body">
    <table class="table no-margin">
        <thead>
            <tr>
                <th><center>Supervisior</center></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=
                        ListView::widget([
                            'dataProvider' => $modelSupervisior,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => 'view_supervisior',
                            'summary'=>'', 
                        ])
                        ?>
                </td>
            </tr>
        </tbody> 
    </table>        
</div>