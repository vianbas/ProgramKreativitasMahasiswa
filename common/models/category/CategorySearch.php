<?php

namespace common\models\category;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\category\Category;

/**
 * CategorySearch represents the model behind the search form about `common\models\category\Category`.
 */
class CategorySearch extends Category
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['category_code', 'category_name', 'public_description'], 'safe'],
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
        $query = Category::find();

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
        ]);

        $query->andFilterWhere(['like', 'category_code', $this->category_code])
            ->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'public_description', $this->public_description]);

        return $dataProvider;
    }
}
