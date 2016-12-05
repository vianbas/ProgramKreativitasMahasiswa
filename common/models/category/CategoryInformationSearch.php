<?php

namespace common\models\category;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\category\CategoryInformation;

/**
 * CategoryInformationSearch represents the model behind the search form about `common\models\category\CategoryInformation`.
 */
class CategoryInformationSearch extends CategoryInformation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_category'], 'integer'],
            [['title', 'description', 'created_at'], 'safe'],
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
        $query = CategoryInformation::find();

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
            'id_category' => $this->id_category,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
