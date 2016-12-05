<?php

namespace common\models\announcement;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\announcement\Announcement;

/**
 * AnnouncementSearch represents the model behind the search form about `frontend\models\Announcement`.
 */
class AnnouncementSearch extends Announcement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['topic', 'id_category', 'description', 'start_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Announcement::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'start_date' => $this->start_date,
        ]);

        $query->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'id_category', $this->id_category])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
