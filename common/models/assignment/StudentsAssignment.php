<?php

namespace common\models\assignment;

use Yii;

/**
 * This is the model class for table "tpkm_students_assignment".
 *
 * @property integer $id_group
 * @property integer $id_students
 *
 * @property TpkmStudents $idStudents
 * @property TpkmGroup $idGroup
 */

class StudentsAssignment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpkm_students_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_students'], 'required'],
            [['id_group', 'id_students'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_group' => 'Id Group',
            'id_students' => 'Id Students',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudents()
    {
        return $this->hasOne(TpkmStudents::className(), ['dim_id' => 'id_students']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup()
    {
        return $this->hasOne(TpkmGroup::className(), ['id' => 'id_group']);
    }
}
