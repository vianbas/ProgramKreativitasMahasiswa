<?php

namespace common\models\proposal;

use Yii;

/**
 * This is the model class for table "tpkm_proposal".
 *
 * @property integer $id
 * @property string $topic
 * @property integer $id_category
 * @property integer $id_group
 * @property string $abstaction
 * @property integer $finalization
 * @property integer $pkm_dikti
 *
 * @property TpkmCategory $idCategory
 * @property TpkmGroup $idGroup
 * @property TpkmProposalRevision[] $tpkmProposalRevisions
 */
class Proposal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpkm_proposal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_group'], 'required'],
            [['id_category', 'id_group', 'finalization', 'pkm_dikti'], 'integer'],
            [['abstaction'], 'string'],
            [['topic'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topic' => 'Topic',
            'id_category' => 'Id Category',
            'id_group' => 'Id Group',
            'abstaction' => 'Abstaction',
            'finalization' => 'Finalization',
            'pkm_dikti' => 'Pkm Dikti',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory()
    {
        return $this->hasOne(\common\models\category\Category::className(), ['ID' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup()
    {
        return $this->hasOne(\common\models\group\Group::className(), ['id' => 'id_group']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpkmProposalRevisions()
    {
        return $this->hasMany(TpkmProposalRevision::className(), ['id_proposal' => 'id']);
    }
}
