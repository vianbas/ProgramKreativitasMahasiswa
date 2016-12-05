<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $thread_id
 * @property integer $author_id
 * @property integer $editor_id
 * @property string $content
 * @property integer $created
 * @property integer $updated
 *
 * @property Thread $thread
 * @property User $author
 * @property User $editor
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['thread_id', 'author_id', 'editor_id', 'updated','parent_id'], 'integer'],
            [['content','created'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thread_id' => 'Thread ID',
            'author_id' => 'Author ID',
            'editor_id' => 'Editor ID',
            'content' => 'Content',
            'created' => 'Created',
            'updated' => 'Updated',
            'parent_id'=>'Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThread()
    {
        return $this->hasOne(Thread::className(), ['id' => 'thread_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getAuthor()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEditor()
    {
        return $this->hasOne(User::className(), ['id' => 'editor_id']);
    }
    
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'parent_id']);
    }    
        
    
}
