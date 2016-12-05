<?php

namespace common\models\students;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\students\Students;

/**
 * StudentsSearch represents the model behind the search form about `common\models\students\Students`.
 */
class StudentsSearch extends Students
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dim_id', 'ref_kbk_id', 'id_kur', 'tahun_kurikulum_id', 'golongan_darah_id', 'jenis_kelamin_id', 'agama_id', 'asal_sekolah_id', 'thn_masuk', 'pekerjaan_ayah_id', 'penghasilan_ayah_id', 'pekerjaan_ibu_id', 'penghasilan_ibu_id', 'pekerjaan_wali_id', 'penghasilan_wali_id', 'anak_ke', 'dari_jlh_anak', 'jumlah_tanggungan', 'score_iq', 'user_id', 'deleted'], 'integer'],
            [['nim', 'no_usm', 'jalur', 'user_name', 'kbk_id', 'kpt_prodi', 'nama', 'tgl_lahir', 'tempat_lahir', 'gol_darah', 'jenis_kelamin', 'agama', 'alamat', 'kabupaten', 'kode_pos', 'email', 'telepon', 'hp', 'hp2', 'no_ijazah_sma', 'nama_sma', 'alamat_sma', 'kabupaten_sma', 'telepon_sma', 'kodepos_sma', 'status_akhir', 'nama_ayah', 'nama_ibu', 'no_hp_ayah', 'no_hp_ibu', 'alamat_orangtua', 'pekerjaan_ayah', 'keterangan_pekerjaan_ayah', 'penghasilan_ayah', 'pekerjaan_ibu', 'keterangan_pekerjaan_ibu', 'penghasilan_ibu', 'nama_wali', 'pekerjaan_wali', 'keterangan_pekerjaan_wali', 'penghasilan_wali', 'alamat_wali', 'telepon_wali', 'no_hp_wali', 'pendapatan', 'rekomendasi_psikotest', 'foto', 'kode_foto', 'deleted_at', 'deleted_by', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['ipk', 'nilai_usm'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Students::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'dim_id' => $this->dim_id,
            'ref_kbk_id' => $this->ref_kbk_id,
            'id_kur' => $this->id_kur,
            'tahun_kurikulum_id' => $this->tahun_kurikulum_id,
            'tgl_lahir' => $this->tgl_lahir,
            'golongan_darah_id' => $this->golongan_darah_id,
            'jenis_kelamin_id' => $this->jenis_kelamin_id,
            'agama_id' => $this->agama_id,
            'asal_sekolah_id' => $this->asal_sekolah_id,
            'thn_masuk' => $this->thn_masuk,
            'pekerjaan_ayah_id' => $this->pekerjaan_ayah_id,
            'penghasilan_ayah_id' => $this->penghasilan_ayah_id,
            'pekerjaan_ibu_id' => $this->pekerjaan_ibu_id,
            'penghasilan_ibu_id' => $this->penghasilan_ibu_id,
            'pekerjaan_wali_id' => $this->pekerjaan_wali_id,
            'penghasilan_wali_id' => $this->penghasilan_wali_id,
            'ipk' => $this->ipk,
            'anak_ke' => $this->anak_ke,
            'dari_jlh_anak' => $this->dari_jlh_anak,
            'jumlah_tanggungan' => $this->jumlah_tanggungan,
            'nilai_usm' => $this->nilai_usm,
            'score_iq' => $this->score_iq,
            'user_id' => $this->user_id,
            'deleted' => $this->deleted,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'no_usm', $this->no_usm])
            ->andFilterWhere(['like', 'jalur', $this->jalur])
            ->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'kbk_id', $this->kbk_id])
            ->andFilterWhere(['like', 'kpt_prodi', $this->kpt_prodi])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'gol_darah', $this->gol_darah])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kabupaten', $this->kabupaten])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'hp', $this->hp])
            ->andFilterWhere(['like', 'hp2', $this->hp2])
            ->andFilterWhere(['like', 'no_ijazah_sma', $this->no_ijazah_sma])
            ->andFilterWhere(['like', 'nama_sma', $this->nama_sma])
            ->andFilterWhere(['like', 'alamat_sma', $this->alamat_sma])
            ->andFilterWhere(['like', 'kabupaten_sma', $this->kabupaten_sma])
            ->andFilterWhere(['like', 'telepon_sma', $this->telepon_sma])
            ->andFilterWhere(['like', 'kodepos_sma', $this->kodepos_sma])
            ->andFilterWhere(['like', 'status_akhir', $this->status_akhir])
            ->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'no_hp_ayah', $this->no_hp_ayah])
            ->andFilterWhere(['like', 'no_hp_ibu', $this->no_hp_ibu])
            ->andFilterWhere(['like', 'alamat_orangtua', $this->alamat_orangtua])
            ->andFilterWhere(['like', 'pekerjaan_ayah', $this->pekerjaan_ayah])
            ->andFilterWhere(['like', 'keterangan_pekerjaan_ayah', $this->keterangan_pekerjaan_ayah])
            ->andFilterWhere(['like', 'penghasilan_ayah', $this->penghasilan_ayah])
            ->andFilterWhere(['like', 'pekerjaan_ibu', $this->pekerjaan_ibu])
            ->andFilterWhere(['like', 'keterangan_pekerjaan_ibu', $this->keterangan_pekerjaan_ibu])
            ->andFilterWhere(['like', 'penghasilan_ibu', $this->penghasilan_ibu])
            ->andFilterWhere(['like', 'nama_wali', $this->nama_wali])
            ->andFilterWhere(['like', 'pekerjaan_wali', $this->pekerjaan_wali])
            ->andFilterWhere(['like', 'keterangan_pekerjaan_wali', $this->keterangan_pekerjaan_wali])
            ->andFilterWhere(['like', 'penghasilan_wali', $this->penghasilan_wali])
            ->andFilterWhere(['like', 'alamat_wali', $this->alamat_wali])
            ->andFilterWhere(['like', 'telepon_wali', $this->telepon_wali])
            ->andFilterWhere(['like', 'no_hp_wali', $this->no_hp_wali])
            ->andFilterWhere(['like', 'pendapatan', $this->pendapatan])
            ->andFilterWhere(['like', 'rekomendasi_psikotest', $this->rekomendasi_psikotest])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'kode_foto', $this->kode_foto])
            ->andFilterWhere(['like', 'deleted_by', $this->deleted_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
