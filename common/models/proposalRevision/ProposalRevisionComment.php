<?php

namespace common\models\proposalRevision;

use Yii;

/**
 * This is the model class for table "tpkm_proposal_revision_comment".
 *
 * @property string $id
 * @property string $comments
 * @property string $date
 * @property string $id_proposal_revision
 *
 * @property TpkmProposalRevision $idProposalRevision
 */
class ProposalRevisionComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpkm_proposal_revision_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comments'], 'required'],
            [['comments'], 'string'],
            [['date'], 'safe'],            
            [['id_proposal_revision','user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comments' => 'Comments',
            'date' => 'Date',
            'id_proposal_revision' => 'Id Proposal Revision',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProposalRevision()
    {
        return $this->hasOne(TpkmProposalRevision::className(), ['id' => 'id_proposal_revision']);
    }
    
    public function getTpkmUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }
}
