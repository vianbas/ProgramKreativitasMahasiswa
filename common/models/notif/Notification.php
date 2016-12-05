<?php

namespace common\models\notif;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property integer $id
 * @property string $key
 * @property integer $key_id
 * @property string $type
 * @property integer $user_id
 * @property integer $seen
 * @property string $created_at
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'type', 'user_id', 'seen', 'created_at'], 'required'],
            [['key_id', 'user_id', 'seen'], 'integer'],
            [['created_at'], 'safe'],
            [['key', 'type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'key_id' => 'Key ID',
            'type' => 'Type',
            'user_id' => 'User ID',
            'seen' => 'Seen',
            'created_at' => 'Created At',
        ];
    }
    
    
    public function Notifuser(){
        
        $model = Notification::find()->where(['user_id'=>Yii::$app->user->id])->orderBy(['id'=>SORT_DESC]);
        
        $dataProvider = new \yii\data\ActiveDataProvider([
           'query'=>$model->limit(6),
           'pagination'=>false
        ]);
                
        return $dataProvider;
        
    }
    
    public function Counts(){        
        $model = Notification::find()->where(['user_id'=>Yii::$app->user->id,'seen'=>0]);
       
        return $model->count();
        
    }
}
