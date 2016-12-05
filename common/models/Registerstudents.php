<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\User;

class Registerstudents extends Model {

    /**
     * @inheritdoc
     */
    public $nim;
    public $nama;
    public $username;
    public $jenis_kelamin;
    public $email;
    public $password;
    public $jalur_usm;
    public $tanggal_lahir;
    public $tempat_lahir;
    public $tahun_kurikulum;
    public $prodi;

    public function rules() {
        return [
            [['nim', 'jenis_kelamin', 'prodi', 'jalur_usm', 'tanggal_lahir', 'tempat_lahir', 'tempat_lahir', 'nama'], 'string'],
            [['username'], 'filter', 'filter' => 'trim'],
            [['username'], 'required'],
            [['tahun_kurikulum'], 'integer'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function register() {
   
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                if ($this->validate()) { //rules harus dijalankan
                $user = new User();
                $user->username = $this->username;
                $user->email = $this->email;
                $user->setPassword($this->password);
                $user->generateAuthKey();

                if ($user->save()) {

                    $students = new \common\models\students\Students();


                    $students->nim = $this->nim;
                    $students->no_usm = $this->nim;
                    $students->jalur = $this->nim;
                    $students->no_usm = $this->nim;
                    $students->jalur = $this->jalur_usm;
                    $students->user_name = $this->username;
                    $students->kbk_id = '11111111';
                    $students->ref_kbk_id = 1;
                    $students->kpt_prodi = $this->prodi;
                    $students->id_kur = 1;
                    $students->tahun_kurikulum_id = 2014;
                    $students->nama = $this->nama;
                    $students->tgl_lahir = $this->tanggal_lahir;
                    $students->gol_darah = '0';
                    $students->golongan_darah_id = 1;
                    $students->jenis_kelamin = $this->jenis_kelamin;
                    $students->jenis_kelamin_id = 1;
                    $students->agama = 'DEFAULT';
                    $students->agama_id = 1;
                    $students->alamat = 'Jalan Sisingamangaraja  Institut Teknologi Del';
                    $students->kabupaten = 'Tobasa';
                    $students->kode_pos = '21127';
                    $students->email = $this->email;
                    $students->telepon = '082168271363';
                    $students->no_ijazah_sma = '13sbchsdbcjh198312';
                    $students->nama_sma = 'SMA UNGGUL DEL';
                    $students->asal_sekolah_id = 1;
                    $students->alamat_sma = 'Jln Arjuna';
                    $students->kabupaten_sma = 'Tobasa';
                    $students->telepon_sma = '08212312312';
                    $students->kodepos_sma = '02122';
                    $students->thn_masuk = $this->tahun_kurikulum;
                    $students->foto = 'upload/foto/1.jpg';
                    $students->user_id = $user->id;

                    if ($students->save()) 
                        {
                        $transaction->commit();
                        return $user;
                        } 
                    else
                        {
                        return null;
                        $transaction->rollBack();
                        }
                   }
                }
                 return null;
            } catch (Exception $e) {
                die($e);
                $transaction->rollBack();
            }           
    }

}
?>


