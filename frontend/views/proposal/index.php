<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\proposal\ProposalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proposals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proposal-index">

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Proposal</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="box">
                            <div class="box-header">
                                <strong>Filter By</strong>
                            </div>
                            <div class="box-body">
                                <?= $this->render('_search.php', ['model' => $searchModel]) ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 2px;">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 220px;">Topic</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 201px;">Category</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column descending" style="width: 155px;" aria-sort="ascending">Year</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 111px;">Group Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 111px;">Status</th>
                                        </tr>
                                    </thead>                   
                                    <tbody>
                                        <?=
                                        ListView::widget([
                                            'dataProvider' => $dataProvider,
                                            'itemOptions' => ['class' => 'item'],
                                            'itemView' => '_proposal',
                                            'summary' => '',
                                        ])
                                        ?>               
                                    </tbody>  
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </section>        

</div>
