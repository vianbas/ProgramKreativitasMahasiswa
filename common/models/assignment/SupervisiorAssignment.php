<?php

namespace common\models\assignment;

use Yii;
use \common\models\pegawai\Pegawai;
/**
 * This is the model class for table "tpkm_supervisior_assignment".
 *
 * @property integer $id_group
 * @property integer $id_supervisior
 *
 * @property TpkmGroup $idGroup
 * @property TpkmPegawai $idSupervisior
 */
class SupervisiorAssignment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpkm_supervisior_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_supervisior'], 'required'],
            [['id_group', 'id_supervisior'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_group' => 'Id Group',
            'id_supervisior' => 'Id Supervisior',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup()
    {
        return $this->hasOne(TpkmGroup::className(), ['id' => 'id_group']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSupervisior()
    {
        return $this->hasOne(Pegawai::className(), ['pegawai_id' => 'id_supervisior']);
    }    
    
}
