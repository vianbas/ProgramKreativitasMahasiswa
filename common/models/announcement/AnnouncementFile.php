<?php

namespace common\models\announcement;

use Yii;

/**
 * This is the model class for table "tpkm_announcement_file".
 *
 * @property string $id
 * @property integer $id_announcement
 * @property string $file_location
 *
 * @property TpkmAnnouncement $idAnnouncement
 */
class AnnouncementFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tpkm_announcement_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_announcement'], 'integer'],
            [['file_location'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_announcement' => 'Id Announcement',
            'file_location' => 'File Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAnnouncement()
    {
        return $this->hasOne(TpkmAnnouncement::className(), ['id' => 'id_announcement']);
    }
}
