<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Abstraction</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?= $model->abstaction ?>
                    </div><!-- /.form-group -->                   
                </div><!-- /.col -->               
            </div><!-- /.row -->
        </div><!-- /.box-body -->
    </div><!-- /.box -->