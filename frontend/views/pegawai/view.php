<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\pegawai\Pegawai */

$this->title = $model->pegawai_id;
$this->params['breadcrumbs'][] = ['label' => 'Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pegawai_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pegawai_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pegawai_id',
            'profile_old_id',
            'nama',
            'nip',
            'kpt_no',
            'kbk_id',
            'ref_kbk_id',
            'alias',
            'posisi',
            'tempat_lahir',
            'tgl_lahir',
            'agama_id',
            'jenis_kelamin_id',
            'golongan_darah_id',
            'hp',
            'telepon',
            'alamat',
            'alamat_libur',
            'kecamatan',
            'kota',
            'kabupaten_id',
            'kode_pos',
            'no_ktp',
            'email:ntext',
            'ext_num',
            'study_area_1',
            'study_area_2',
            'jabatan',
            'jabatan_akademik_id',
            'gbk_1',
            'gbk_2',
            'status_ikatan_kerja_pegawai_id',
            'status_akhir',
            'status_aktif_pegawai_id',
            'tanggal_masuk',
            'tanggal_keluar',
            'nama_bapak',
            'nama_ibu',
            'status',
            'status_marital_id',
            'nama_p',
            'tgl_lahir_p',
            'tmp_lahir_p',
            'pekerjaan_ortu',
            'user_id',
            'deleted',
            'deleted_at',
            'deleted_by',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
        ],
    ]) ?>

</div>
