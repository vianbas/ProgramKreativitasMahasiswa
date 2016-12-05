<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\pegawai\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'profile_old_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpt_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kbk_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ref_kbk_id')->textInput() ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'posisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'agama_id')->textInput() ?>

    <?= $form->field($model, 'jenis_kelamin_id')->textInput() ?>

    <?= $form->field($model, 'golongan_darah_id')->textInput() ?>

    <?= $form->field($model, 'hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput() ?>

    <?= $form->field($model, 'alamat_libur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kabupaten_id')->textInput() ?>

    <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ext_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'study_area_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'study_area_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jabatan_akademik_id')->textInput() ?>

    <?= $form->field($model, 'gbk_1')->textInput() ?>

    <?= $form->field($model, 'gbk_2')->textInput() ?>

    <?= $form->field($model, 'status_ikatan_kerja_pegawai_id')->textInput() ?>

    <?= $form->field($model, 'status_akhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_aktif_pegawai_id')->textInput() ?>

    <?= $form->field($model, 'tanggal_masuk')->textInput() ?>

    <?= $form->field($model, 'tanggal_keluar')->textInput() ?>

    <?= $form->field($model, 'nama_bapak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_marital_id')->textInput() ?>

    <?= $form->field($model, 'nama_p')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir_p')->textInput() ?>

    <?= $form->field($model, 'tmp_lahir_p')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_ortu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <?= $form->field($model, 'deleted_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
