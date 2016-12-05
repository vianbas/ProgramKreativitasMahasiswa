<?php

namespace common\models\announcement;

use Yii;

/**
 * This is the model class for table "tpkm_announcement".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $topic
 * @property string $id_category
 * @property string $description
 * @property string $start_date
 *
 * @property TpkmAnnouncementFile[] $tpkmAnnouncementFiles
 * @property TpkmCategory $tpkmCategory
 */
class Announcement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    
    public static function tableName()
    {
        return 'tpkm_announcement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic', 'id_category', 'description'], 'required'],
            [['user_id','id'], 'integer'],
            [['description'], 'string'],
            [['start_date'], 'safe'],
            [['topic'], 'string', 'max' => 55],
            [['id_category'], 'string', 'max' => 11],
            [['file'], 
            'file', 
            'maxFiles' => 10, 
            'extensions' => ['doc','docx','pdf','mp3'],

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
            'user_id' => 'User ID',
            'topic' => 'Topic',
            'id_category' => 'Id Category',
            'description' => 'Description',
            'start_date' => 'Start Date',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpkmAnnouncementFiles()
    {
        return $this->hasMany(AnnouncementFile::className(), ['id_announcement' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpkmCategory()
    {
        return $this->hasOne(TpkmCategory::className(), ['id' => 'id']);
    }
}
