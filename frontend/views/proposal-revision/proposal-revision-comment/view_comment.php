<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class='box-comment'>
    <!-- User image -->
    <img class='img-circle img-sm' src='<?=$model->tpkmUser->members->foto?>' alt='user image'>
    <div class='comment-text'>
        <span class="username">
            <?= $model->tpkmUser->username ?>
            <span class='text-muted pull-right'>8:03 PM Today</span>
        </span><!-- /.username -->
        <?= $model->comments ?>
    </div><!-- /.comment-text -->
</div><!-- /.box-comment -->

