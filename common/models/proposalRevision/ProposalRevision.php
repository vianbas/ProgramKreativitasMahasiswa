<?php

namespace common\models\proposalRevision;

use Yii;

/**
 * This is the model class for table "tpkm_proposal_revision".
 *
 * @property string $id
 * @property integer $id_proposal
 * @property string $topic
 * @property integer $id_category
 * @property string $abstraction
 * @property string $description
 * @property string $start_date
 * @property string $due_date
 * @property integer $finalization
 *
 * @property TpkmProposalFile $id0
 * @property TpkmProposalRevisionComment[] $tpkmProposalRevisionComments
 */
class ProposalRevision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    
    public static function tableName()
    {
        return 'tpkm_proposal_revision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic', 'id_category', 'abstraction','description'], 'required'],
            [['id_proposal', 'id_category', 'finalization'], 'integer'],
            [['description'], 'string'],
            [['start_date', 'due_date'], 'safe'],
            [['topic'], 'string'],
            [['abstraction'], 'string'],
            [['file'], 
            'file', 
            //'maxFiles' => 10, 
            'extensions' => ['doc','docx','pdf'],
            'maxSize' => 1024 * 1024 * 2
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_proposal' => 'Id Proposal',
            'topic' => 'Topic',
            'id_category' => 'Id Category',
            'abstraction' => 'Abstraction',
            'description' => 'Description',
            'start_date' => 'Start Date',
            'due_date' => 'Due Date',
            'finalization' => 'Finalization',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(TpkmProposalFile::className(), ['id_proposal_revision' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpkmProposalRevisionComments()
    {
        return $this->hasMany(TpkmProposalRevisionComment::className(), ['id_proposal_revision' => 'id']);
    }
    
    public function getTpkmProposalRevisionFile()
    {
        return $this->hasOne(\common\models\proposal\ProposalFile::className(), ['id_proposal_revision' => 'id']);
    }
    
    public function getIdCategory()
    {
        return $this->hasOne(\common\models\category\Category::className(), ['ID' => 'id_category']);
    }

    
}
