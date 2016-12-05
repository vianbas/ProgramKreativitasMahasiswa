<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\students\StudentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dim_id') ?>

    <?= $form->field($model, 'nim') ?>

    <?= $form->field($model, 'no_usm') ?>

    <?= $form->field($model, 'jalur') ?>

    <?= $form->field($model, 'user_name') ?>

    <?php // echo $form->field($model, 'kbk_id') ?>

    <?php // echo $form->field($model, 'ref_kbk_id') ?>

    <?php // echo $form->field($model, 'kpt_prodi') ?>

    <?php // echo $form->field($model, 'id_kur') ?>

    <?php // echo $form->field($model, 'tahun_kurikulum_id') ?>

    <?php // echo $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'gol_darah') ?>

    <?php // echo $form->field($model, 'golongan_darah_id') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'jenis_kelamin_id') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'agama_id') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'kabupaten') ?>

    <?php // echo $form->field($model, 'kode_pos') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'telepon') ?>

    <?php // echo $form->field($model, 'hp') ?>

    <?php // echo $form->field($model, 'hp2') ?>

    <?php // echo $form->field($model, 'no_ijazah_sma') ?>

    <?php // echo $form->field($model, 'nama_sma') ?>

    <?php // echo $form->field($model, 'asal_sekolah_id') ?>

    <?php // echo $form->field($model, 'alamat_sma') ?>

    <?php // echo $form->field($model, 'kabupaten_sma') ?>

    <?php // echo $form->field($model, 'telepon_sma') ?>

    <?php // echo $form->field($model, 'kodepos_sma') ?>

    <?php // echo $form->field($model, 'thn_masuk') ?>

    <?php // echo $form->field($model, 'status_akhir') ?>

    <?php // echo $form->field($model, 'nama_ayah') ?>

    <?php // echo $form->field($model, 'nama_ibu') ?>

    <?php // echo $form->field($model, 'no_hp_ayah') ?>

    <?php // echo $form->field($model, 'no_hp_ibu') ?>

    <?php // echo $form->field($model, 'alamat_orangtua') ?>

    <?php // echo $form->field($model, 'pekerjaan_ayah') ?>

    <?php // echo $form->field($model, 'pekerjaan_ayah_id') ?>

    <?php // echo $form->field($model, 'keterangan_pekerjaan_ayah') ?>

    <?php // echo $form->field($model, 'penghasilan_ayah') ?>

    <?php // echo $form->field($model, 'penghasilan_ayah_id') ?>

    <?php // echo $form->field($model, 'pekerjaan_ibu') ?>

    <?php // echo $form->field($model, 'pekerjaan_ibu_id') ?>

    <?php // echo $form->field($model, 'keterangan_pekerjaan_ibu') ?>

    <?php // echo $form->field($model, 'penghasilan_ibu') ?>

    <?php // echo $form->field($model, 'penghasilan_ibu_id') ?>

    <?php // echo $form->field($model, 'nama_wali') ?>

    <?php // echo $form->field($model, 'pekerjaan_wali') ?>

    <?php // echo $form->field($model, 'pekerjaan_wali_id') ?>

    <?php // echo $form->field($model, 'keterangan_pekerjaan_wali') ?>

    <?php // echo $form->field($model, 'penghasilan_wali') ?>

    <?php // echo $form->field($model, 'penghasilan_wali_id') ?>

    <?php // echo $form->field($model, 'alamat_wali') ?>

    <?php // echo $form->field($model, 'telepon_wali') ?>

    <?php // echo $form->field($model, 'no_hp_wali') ?>

    <?php // echo $form->field($model, 'pendapatan') ?>

    <?php // echo $form->field($model, 'ipk') ?>

    <?php // echo $form->field($model, 'anak_ke') ?>

    <?php // echo $form->field($model, 'dari_jlh_anak') ?>

    <?php // echo $form->field($model, 'jumlah_tanggungan') ?>

    <?php // echo $form->field($model, 'nilai_usm') ?>

    <?php // echo $form->field($model, 'score_iq') ?>

    <?php // echo $form->field($model, 'rekomendasi_psikotest') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'kode_foto') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <?php // echo $form->field($model, 'deleted_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
