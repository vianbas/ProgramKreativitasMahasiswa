<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
        <?=
        yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'viewParams'=>['id_category'=>10],
            'itemOptions'=> ['class' => 'item'],
            'itemView' => 'a',
        ])
        ?>      
