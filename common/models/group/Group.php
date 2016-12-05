<?php

namespace common\models\group;

use Yii;
use common\models\assignment\StudentsAssignment;
use \common\models\assignment\LeaderAssignment;
use \common\models\assignment\MemberAssignment;

/**
 * This is the model class for table "tpkm_group".
 *
 * @property integer $id
 * @property string $group_name
 * @property string $Description
 * @property string $year
 *
 * @property TpkmProposal[] $tpkmProposals
 * @property TpkmStudentsAssignment[] $tpkmStudentsAssignments
 * @property TpkmSupervisiorAssignment[] $tpkmSupervisiorAssignments
 */
class Group extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public $supervisior;
    public $leader;
    public $category;
    public $nim_user = [];

    public static function tableName() {
        return 'tpkm_group';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['group_name', 'Description', 'category', 'year', 'supervisior', 'leader', 'nim_user'], 'required'],
            [['nim_user'], 'validateMember'],
            [['leader'], 'validateLeader'],
            [['supervisior'], 'validateSupervisior'],
            [['Description'], 'string'],
            [['year'], 'safe'],
            [['category'], 'integer'],
            [['group_name'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function validateMember() {
        $result = count($this->nim_user);
        if ($result > 2) {
            $this->addError("nim_user", "Maximal 2 Anggota");
        }

        $result = Yii::$app->db->createCommand('SELECT count(*) FROM tpkm_group JOIN tpkm_member_assignment ON  (tpkm_member_assignment.id_group = tpkm_group.id) WHERE tpkm_group.year = ' . $this->year . ' AND tpkm_member_assignment.id_students = ' . $this->nim_user[0])->queryScalar();
        if ($result > 0) {
            $this->addError("nim_user", "Mahasiswa " . $this->Students($this->nim_user[0])->nama . " terdaftar sebagai Anggota pada tahun " . $this->year);
        }

        $result = Yii::$app->db->createCommand('SELECT count(*) FROM tpkm_group JOIN tpkm_member_assignment ON  (tpkm_member_assignment.id_group = tpkm_group.id) WHERE tpkm_group.year = ' . $this->year . ' AND tpkm_member_assignment.id_students = ' . $this->nim_user[1])->queryScalar();
        if ($result > 0) {
            $this->addError("nim_user", "Mahasiswa " . $this->Students($this->nim_user[1])->nama . " terdaftar sebagai Anggota pada tahun " . $this->year);
        }
    }

    public function validateLeader() {
        $result = Yii::$app->db->createCommand('SELECT count(*) FROM tpkm_group JOIN tpkm_leader_assignment ON  (tpkm_leader_assignment.id_group = tpkm_group.id) WHERE tpkm_group.year = ' . $this->year . ' AND tpkm_leader_assignment.id_students = ' . $this->leader)->queryScalar();
        if ($result > 0) {
            $this->addError("leader", "Mahasiswa " . $this->Students($this->leader)->nama . " terdaftar sebagai ketua pada tahun " . $this->year);
        }

        if ($this->leader == $this->nim_user[0] || $this->leader == $this->nim_user[1]) {
            $this->addError("leader", "Data " . $this->Students($this->leader)->nama . " Duplicate");
            $this->addError("nim_user", "Data " . $this->Students($this->leader)->nama . " Duplicate");
        }
    }

    public function validateSupervisior() {
        $result = Yii::$app->db->createCommand('SELECT count(*) FROM tpkm_group JOIN tpkm_supervisior_assignment ON  (tpkm_supervisior_assignment.id_group = tpkm_group.id) WHERE tpkm_group.year = ' . $this->year . ' AND tpkm_supervisior_assignment.id_supervisior = ' . $this->supervisior)->queryScalar();
        if ($result > 1) {
            $this->addError("supervisior", $this->Supervisior($this->supervisior)->nama . " telah terdaftar pada 2 Tim sebagai supervisior pada tahun " . $this->year);
        }
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'leader' => 'Leader',
            'group_name' => 'Group Name',
            'Description' => 'Group Description',
            'year' => 'Year',
            'nim_user'=>'Members'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpkmProposal() {
        return $this->hasOne(\common\models\proposal\Proposal::className(), ['id_group' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpkmMemberAssignments() {
        return $this->hasMany(MemberAssignment::className(), ['id_group' => 'id']);
    }

    public function getTpkmLeaderAssignments() {
        return $this->hasMany(LeaderAssignment::className(), ['id_group' => 'id']);
    }

    public function getTpkmStudents() {
        return $this->hasOne(\common\models\students\Students::className(), ['dim_id' => 'leader']);
    }

    public function Students($id) {
        return \common\models\students\Students::findOne($id);
    }

    public function Supervisior($id) {
        return \common\models\pegawai\Pegawai::findOne($id);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpkmSupervisiorAssignments() {
        return $this->hasMany(\common\models\assignment\SupervisiorAssignment::className(), ['id_group' => 'id']);
    }

}
