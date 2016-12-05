<?php

namespace common\models\assignment;

use Yii;
use \common\models\students\Students;

/**
 * This is the model class for table "tpkm_member_assignment".
 *
 * @property string $id
 * @property integer $id_group
 * @property integer $id_students
 *
 * @property TpkmStudents $idStudents
 * @property TpkmGroup $idGroup
 */
class MemberAssignment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpkm_member_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_group', 'id_students'], 'required'],
            [['id_group', 'id_students'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_group' => 'Id Group',
            'id_students' => 'Id Students',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudents()
    {
        return $this->hasOne(Students::className(), ['dim_id' => 'id_students']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup()
    {
        return $this->hasOne(TpkmGroup::className(), ['id' => 'id_group']);
    }
}
