<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\students\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_usm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jalur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kbk_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ref_kbk_id')->textInput() ?>

    <?= $form->field($model, 'kpt_prodi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kur')->textInput() ?>

    <?= $form->field($model, 'tahun_kurikulum_id')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gol_darah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'golongan_darah_id')->textInput() ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin_id')->textInput() ?>

    <?= $form->field($model, 'agama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agama_id')->textInput() ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kabupaten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hp2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_ijazah_sma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_sma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asal_sekolah_id')->textInput() ?>

    <?= $form->field($model, 'alamat_sma')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kabupaten_sma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telepon_sma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kodepos_sma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thn_masuk')->textInput() ?>

    <?= $form->field($model, 'status_akhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_orangtua')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pekerjaan_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_ayah_id')->textInput() ?>

    <?= $form->field($model, 'keterangan_pekerjaan_ayah')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'penghasilan_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penghasilan_ayah_id')->textInput() ?>

    <?= $form->field($model, 'pekerjaan_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_ibu_id')->textInput() ?>

    <?= $form->field($model, 'keterangan_pekerjaan_ibu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'penghasilan_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penghasilan_ibu_id')->textInput() ?>

    <?= $form->field($model, 'nama_wali')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_wali')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_wali_id')->textInput() ?>

    <?= $form->field($model, 'keterangan_pekerjaan_wali')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'penghasilan_wali')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penghasilan_wali_id')->textInput() ?>

    <?= $form->field($model, 'alamat_wali')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'telepon_wali')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp_wali')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pendapatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipk')->textInput() ?>

    <?= $form->field($model, 'anak_ke')->textInput() ?>

    <?= $form->field($model, 'dari_jlh_anak')->textInput() ?>

    <?= $form->field($model, 'jumlah_tanggungan')->textInput() ?>

    <?= $form->field($model, 'nilai_usm')->textInput() ?>

    <?= $form->field($model, 'score_iq')->textInput() ?>

    <?= $form->field($model, 'rekomendasi_psikotest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput() ?>

    <?= $form->field($model, 'deleted_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
