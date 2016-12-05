<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

if (Yii::$app->controller->action->id === 'login') {
    /**
     * Do not use this code in your template. Remove it. 
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    echo $this->render(
            'main-login', ['content' => $content]
    );
}
else  if (Yii::$app->controller->action->id === 'register') {
    /**
     * Do not use this code in your template. Remove it. 
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    echo $this->render(
            'main-register', ['content' => $content]
    );
}
else {
    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }


    machour\yii2\notifications\widgets\NotificationsAsset::register($this);
    dmstr\web\AdminLteAsset::register($this);
    \machour\yii2\notifications\widgets\NotificationsAsset::register($this);
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
        <head>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <meta charset="<?= Yii::$app->charset ?>"/>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?= Html::csrfMetaTags() ?>
            <title><?= Html::encode($this->title) ?></title>
            <?php $this->head() ?>        
        </head>
        <body class="hold-transition skin-purple-light layout-boxed layout-top-nav" >
                <?php $this->beginBody() ?>
            <div class="wrapper">
                <?=
                $this->render(
                       'header.php', ['directoryAsset' => $directoryAsset]
                )
                ?>                
                <?=
                $this->render(
                        'content.php', ['content' => $content, 'directoryAsset' => $directoryAsset]
                )
                ?>
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.0
                </div>
                <strong>Copyright &copy; 2015-2016 <a href="http://cis.del.ac.id">SYP-03</a></strong> All rights
                reserved.
            </footer>
    <?php $this->endBody() ?>
        </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
