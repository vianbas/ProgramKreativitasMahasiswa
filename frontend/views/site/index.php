<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Home';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-index">
    <div class="container">
        <?= $this->render('header-slider_1') ?>
        <div class="col-md-12 no-padding">
            <div class="box box-primary no-border">
                <div class="box-body">
                    <img src="logo/logo.png " width="50" />
<justify>                    PKM merupakan salah satu upaya yang dilakukan oleh Direktorat Riset dan Pengabdian Masyarakat, Direktorat Jenderal Penguatan Riset dan Pengembangan, Kementerian Ristek Dikti untuk meningkatkan mutu peserta didik (mahasiswa) di Perguruan Tinggi agar kelak dapat menjadi anggota masyarakat yang memiliki kemampuan akademis dan/atau profesional yang dapat menerapkan, mengembangkan dan meyebarluaskan ilmu pengetahuan, teknologi dan/atau kesenian serta memperkaya budaya nasional. </justify>           
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <?=
                $this->render('detail_index', [
                    'dataProvider' => $dataProvider,
                    'dataProviderProposal' => $dataProviderProposal,
                    'dataProviderPost' => $dataProviderPost,
                        ]
                )
                ?>
            </div>    
            <div class="col-md-3">
                <?= $this->render('pengumuman', ['dataProvider' => $dataProvider]) ?>
            </div>             
        </div>
    </div>
</div>

