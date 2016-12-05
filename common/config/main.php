<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager'=>['class'=>'yii\rbac\DbManager'],
    ],
    'modules' => [
        'auth' => [
            'class' => 'common\modules\auth\Module',
        ],
        'notifications' => [
            'class' => 'machour\yii2\notifications\NotificationsModule',
            // Point this to your own Notification class
            // See the "Declaring your notifications" section below
            'notificationClass' => 'common\models\Notification',
            // This callable should return your logged in user Id
            'userId' => function() {
                return \Yii::$app->user->id;
            }
        ],
    ],
    
];
