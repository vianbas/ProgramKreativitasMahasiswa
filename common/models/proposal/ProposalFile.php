<?php

namespace common\models\proposal;

use Yii;

/**
 * This is the model class for table "tpkm_proposal_file".
 *
 * @property string $id_proposal_revision
 * @property string $file_location
 * @property string $uploaded_at
 * @property integer $uploaded_by
 *
 * @property TpkmProposalRevision $idProposalRevision
 */
class ProposalFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpkm_proposal_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proposal_revision', 'file_location'], 'required'],
            [['id_proposal_revision', 'uploaded_by'], 'integer'],
            [['uploaded_at'], 'safe'],
            [['file_location'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_proposal_revision' => 'Id Proposal Revision',
            'file_location' => 'File Location',
            'uploaded_at' => 'Uploaded At',
            'uploaded_by' => 'Uploaded By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserupload()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'uploaded_by']);
    }
    
    public function getIdProposalRevision()
    {
        return $this->hasOne(TpkmProposalRevision::className(), ['id' => 'id_proposal_revision']);
    }
}
