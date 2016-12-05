<?php
/* @var $this yii\web\View */
/* @var $model common\models\Group */

$this->title = 'Group ' . $model->group_name;
//$this->params['breadcrumbs'][] = ['label' => 'Groups', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
use yii\helpers\Html;
use yii\bootstrap\Modal;
?>

<div class="group-view">
    <div class="container">
        <div class="announcement-view">
            <section class="invoice no-margin ">
                <div class="box box-widget no-border">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="page-header">
                                <?= $proposal->idCategory->category_name . ' -  ' . $proposal->topic ?>
                            </h3>
                        </div><!-- /.col -->
                        <div class="col-md-12">
                            <?= $this->render('../proposal_information/abstraction.php', ['model' => $proposal]) ?>    
                        </div>
                    </div>               
                </div>
                <br>
                <?php if(!Yii::$app->user->isGuest){
                    if (($akses == 1 || $akses == 2 ) && $proposal->finalization == 0) { ?>
                    <?= Html::a('New Revison', ['proposal-revision/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?php } ?>
                <?php if ($proposal->finalization == 0 && $akses == 2) { ?>
                    <?=
                    Html::a('Set Document Final', ['proposal/final', 'id' => $proposal->id], [
                        'class' => 'btn btn-success',
                        'data' => [
                            'confirm' => 'Are you sure you want to set this proposal Final?',
                            'method' => 'post',
                        ],
                    ])
                    ?>

                <?php } ?>
                <?php if ($proposal->finalization == 0 && $akses == 2) { ?>
                    <?=
                    Html::a('cancel proposal', ['proposal/cancel', 'id' => $proposal->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to cancel this document?',
                            'method' => 'post',
                        ],
                    ])
                    ?>
                <?php } ?>
                <?php if ($proposal->finalization == 1 && $akses == 2 && $proposal->pkm_dikti==0) { ?>
                    <?=
                    Html::a('Set Document accepted in Dikti', ['proposal/dikti', 'id' => $proposal->id], [
                        'class' => 'btn btn-success',
                        'data' => [
                            'confirm' => 'Are you sure you want to set this proposal accepted in Dikti ?',
                            'method' => 'post',
                        ],
                    ])
                    ?>
                <?php } }?>

                <br>
                <br>
                <section class="invoice no-margin no-padding"> 
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#proposal" data-toggle="tab">Proposal</a></li>
                            <li><a href="#group-member" data-toggle="tab">Group Member</a></li>             
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="proposal">
<?= $this->render('../file/index.php', ['id' => $proposal->id, 'proposalRevision' => $proposalRevision]) ?>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="group-member">
                                <!-- The timeline -->
<?= $this->render('../member/index.php', ['model' => $model, 'modelStudents' => $modelStudents, 'modelSupervisior' => $modelSupervisior, 'modelLeader' => $modelLeader]) ?>
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                    </div><!-- /.nav-tabs-custom -->
                </section>
            </section>
        </div>
    </div>
</div>




<!-- General Proposal -->    

<!--Proposal File -->
