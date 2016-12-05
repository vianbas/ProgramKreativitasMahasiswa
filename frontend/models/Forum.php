<?php

namespace frontend\models;

use Yii;
use frontend\models\Thread;
/**
 * This is the model class for table "forum".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $description
 * @property integer $is_locked
 *
 * @property Forum $parent
 * @property Forum[] $forums
 * @property Thread[] $threads
 */
class Forum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'is_locked'], 'integer'],
            [['title', 'description', 'is_locked'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'title' => 'Title',
            'description' => 'Description',
            'is_locked' => 'Is Locked',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Forum::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForums()
    {
        return $this->hasMany(Forum::className(), ['parent_id' => 'id']);
    }
    
    public function getForumss()
    {
        return $this->hasOne(Forum::className(), ['id' =>'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThreads()
    {
        return $this->hasMany(Thread::className(), ['forum_id' => 'id']);
    }
    
   
    
}
