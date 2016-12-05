<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\web\JqueryAsset;
?>
<?php //echo $this->render('_search', ['model' => $searchModel]);    ?>


<script>
    $(document).ready(function () {
        $("#heyy").click(function () {
            $("#p").show();
        });
    });
</script> 

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">My Group</h3>
         
    </div><!-- /.box-header -->
    <div class="box-body" id="satu">
        <div class="table-responsive">
            <table class="table no-margin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Group Name</th>
                        <th>Year</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?=
                    ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemOptions' => ['class' => 'item'],
                        'itemView' => 'view_group',
                        'summary' => '',
                    ])
                    ?>                           
                </tbody>
            </table>
        </div><!-- /.table-responsive -->
    </div><!-- /.box-body -->        
</div>

<div hidden="false">
<?= $this->render('note.php') ?>
</div>
<!-- /.box -->

