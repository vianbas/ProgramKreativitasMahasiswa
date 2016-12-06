<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=ap-cdbr-azure-southeast-b.cloudapp.net;dbname=pkm_db',
            'username' => 'bb3f8d584c78f6',
            'password' => 'e681ef61',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
