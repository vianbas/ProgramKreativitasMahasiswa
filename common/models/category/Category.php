<?php

namespace common\models\category;

use Yii;

/**
 * This is the model class for table "tpkm_category".
 *
 * @property integer $id
 * @property string $category_code
 * @property string $category_name
 * @property string $public_description
 *
 * @property TpkmAnnouncement $iD
 * @property TpkmCategoryInformation $tpkmCategoryInformation
 * @property TpkmProposal[] $tpkmProposals
 * @property TpkmProposalRevision[] $tpkmProposalRevisions
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpkm_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_code', 'public_description'], 'required'],
            [['category_code'], 'string', 'max' => 50],
            [['category_name'], 'string', 'max' => 55],
            [['public_description'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_code' => 'Category Code',
            'category_name' => 'Category Name',
            'public_description' => 'Public Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getID()
    {
        return $this->hasOne(TpkmAnnouncement::className(), ['id' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpkmCategoryInformation()
    {
        return $this->hasOne(TpkmCategoryInformation::className(), ['id_category' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpkmProposals()
    {
        return $this->hasMany(TpkmProposal::className(), ['id_category' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpkmProposalRevisions()
    {
        return $this->hasMany(TpkmProposalRevision::className(), ['id_category' => 'ID']);
    }
}
