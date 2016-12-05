<?php

namespace common\models\proposalRevision;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\proposalRevision\ProposalRevision;

/**
 * ProposalRevisionSearch represents the model behind the search form about `common\models\proposalRevision\ProposalRevision`.
 */
class ProposalRevisionSearch extends ProposalRevision
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_proposal', 'id_category', 'finalization'], 'integer'],
            [['topic', 'abstraction', 'description', 'start_date', 'due_date'], 'safe'],
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
        $query = ProposalRevision::find();

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
            'id_proposal' => $this->id_proposal,
            'id_category' => $this->id_category,
            'start_date' => $this->start_date,
            'due_date' => $this->due_date,
            'finalization' => $this->finalization,
        ]);

        $query->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'abstraction', $this->abstraction])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
