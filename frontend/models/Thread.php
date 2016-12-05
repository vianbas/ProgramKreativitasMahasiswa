<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "thread".
 *
 * @property integer $id
 * @property integer $forum_id
 * @property string $subject
 * @property integer $is_locked
 * @property string $view_count
 * @property integer $created
 *
 * @property Post[] $posts
 * @property Forum $forum
 */
class Thread extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $content;
    
    public static function tableName()
    {
        return 'thread';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject','content'], 'required'],
            [['forum_id', 'is_locked', 'view_count','author_id'], 'integer'],
            [['subject','created'], 'string', 'max' => 200],
            [['content'],'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'forum_id' => 'Forum ID',
            'subject' => 'Subject',
            'is_locked' => 'Is Locked',
            'view_count' => 'View Count',
            'created' => 'Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['thread_id' => 'id']);
    }
    
    public function getAuthor()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'author_id']);
    }
    
    public function getThread()
    {
        return $this->hasOne(Thread::className(), ['id' => 'thread_id']);
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForum()
    {
        return $this->hasOne(Forum::className(), ['id' => 'forum_id']);
    }
    
    public function getPost()
    {
        $last = Yii::$app->db->createCommand('SELECT author_id FROM post WHERE thread_id ='.$this->id.' ORDER BY id DESC LIMIT 1')->queryScalar();                       
        return \common\models\User::findOne($last)->username;
    }
    
    public function getLastPost()
    {
        $last = Yii::$app->db->createCommand('SELECT created FROM post WHERE thread_id ='.$this->id.' ORDER BY id DESC LIMIT 1')->queryScalar();                       
        return $last;
    }
    
    public function getCountPost()
    {
        $last = Yii::$app->db->createCommand('SELECT COUNT(*) FROM post WHERE thread_id = '.$this->id)->queryScalar();                       
        return $last;
    }     
}
