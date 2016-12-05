<?php

namespace common\models\category;

use Yii;

/**
 * This is the model class for table "tpkm_category_information".
 *
 * @property integer $id
 * @property integer $id_category
 * @property string $title
 * @property string $description
 * @property string $created_at
 *
 * @property TpkmCategory $idCategory
 */
class CategoryInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpkm_category_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_category', 'title', 'description', 'created_at'], 'required'],
            [['id_category'], 'integer'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category' => 'Id Category',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory()
    {
        return $this->hasOne(TpkmCategory::className(), ['id' => 'id_category']);
    }
}
