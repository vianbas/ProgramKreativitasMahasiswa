<?php

namespace common\models\announcement;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\announcement\AnnouncementFile;

/**
 * AnnouncementFileSearch represents the model behind the search form about `frontend\models\AnnouncementFile`.
 */
class AnnouncementFileSearch extends AnnouncementFile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_announcement'], 'integer'],
            [['file_location'], 'safe'],
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
        $query = AnnouncementFile::find();

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
            'id_announcement' => $this->id_announcement,
        ]);

        $query->andFilterWhere(['like', 'file_location', $this->file_location]);

        return $dataProvider;
    }
}
