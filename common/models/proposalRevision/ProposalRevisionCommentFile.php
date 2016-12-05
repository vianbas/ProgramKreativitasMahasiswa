<?php

namespace common\models\proposalRevision;

use Yii;

/**
 * This is the model class for table "tpkm_proposal_revision_comment_file".
 *
 * @property string $id
 * @property string $id_p_r_comment
 * @property string $file
 *
 * @property TpkmProposalRevisionComment $idPRComment
 */
class ProposalRevisionCommentFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpkm_proposal_revision_comment_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_p_r_comment'], 'required'],
            [['id_p_r_comment'], 'integer'],
            [['file'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_p_r_comment' => 'Id P R Comment',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPRComment()
    {
        return $this->hasOne(TpkmProposalRevisionComment::className(), ['id' => 'id_p_r_comment']);
    }
}
