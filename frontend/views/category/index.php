<?php

use yii\widgets\ListView;

$this->title = 'Category';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="wrapper">    
    <div class="pad  box-default">        
        <div class="box-body">            
            <div id="maindiv">
                <div class="container">
                    <?=
                        ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemOptions' => ['class' => 'item'],
                            'itemView' => 'list_category',
                            'summary'=>'',
                        ])
                        ?>  
                </div>
            </div>
        </div>
    </div>
</div>


