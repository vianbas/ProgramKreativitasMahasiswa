<?php
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

/* @var $this \yii\web\View */
/* @var $content string */

?>

<header class="main-header" style="position: relative">    
        <?php
    NavBar::begin([
        'brandLabel' => 'Program Kreatifitas Mahasiswa',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-static-top',
        ],
    ]);    
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Forum', 'url' => ['/forum/forums']],
        ['label' => 'Category', 'url' => ['/category/index']],
        ['label' => 'Proposal', 'url' => ['/proposal/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {  
        $menuItems[]= $this->render(
            'notification.php',
            ['directoryAsset' => $directoryAsset]
        );
    }
    if (!Yii::$app->user->isGuest) {         
        $menuItems[] = $this->render(
            'dropdown.php',
            ['directoryAsset' => $directoryAsset]
        );
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav pull-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>        
</header>
