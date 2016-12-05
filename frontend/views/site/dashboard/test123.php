<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Modal::begin([
    'id' => 'createGroup',
    'url' => Url::to(['group/register']), // Ajax view with form to load
    'ajaxSubmit' => true, // Submit the contained form as ajax, true by default
    // ... any other yii2 bootstrap modal option you need
]);
Modal::end(); ?>
?>
