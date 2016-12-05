<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
                
<div class="content-wrapper" style="padding-top: -100px">
    <section class="content-header" style="padding:0px ">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <h1>
                <?php
//                if ($this->title !== null) {
//                    echo \yii\helpers\Html::encode($this->title);
//                } else {
//                    echo \yii\helpers\Inflector::camel2words(
//                        \yii\helpers\Inflector::id2camel($this->context->module->id)
//                    );
//                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
//                } ?>
            </h1>
        <?php } ?>

        <?php
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>    
    </section>
    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

