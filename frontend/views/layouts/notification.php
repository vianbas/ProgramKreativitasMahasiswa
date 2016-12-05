<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\widgets\ListView;
$notif = new common\models\notif\Notification();

$dataProvider = $notif->Notifuser();


?>

<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning notifications-icon-count"><?=$notif->Counts()?></span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have <span class="notifications-header-count"><?=$notif->Counts()?></span> notifications</li>
                  <?=
                                        ListView::widget([
                                            'dataProvider' => $dataProvider,
                                            'itemOptions' => ['class' => 'item'],
                                            'itemView' => '_notif',
                                            'summary' => '',
                                        ])
                                        ?>               
        <li class="footer"><?= yii\helpers\Html::a('View all',['notification/index'])?></a></li>
    </ul>
</li>