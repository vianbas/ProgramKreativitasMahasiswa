<?php

namespace common\models\proposal;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\proposal\Proposal;

/**
 * ProposalSearch represents the model behind the search form about `common\models\proposal\Proposal`.
 */
class ProposalSearch extends Proposal
{
    /**
     * @inheritdoc
     */
    public $year;
    public $group_name;
    
    public function rules()
    {
        return [
            [['id', 'id_category', 'id_group', 'finalization', 'pkm_dikti'], 'integer'],
            [['topic', 'abstaction'], 'safe'],
            [['year','group_name'],'safe']
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
        $query = Proposal::find();
        $query->joinWith(['idGroup']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->sort->attributes['year'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['tpkm_group.year' => SORT_ASC],
            'desc' => ['tpkm_group.year' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_category' => $this->id_category,
            'id_group' => $this->id_group,
            'finalization' => $this->finalization,
            'pkm_dikti' => $this->pkm_dikti,
        ]);

        $query->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'abstaction', $this->abstaction])
        ->andFilterWhere(['like', 'tpkm_group.year', $this->year])
        ->andFilterWhere(['like', 'tpkm_group.year', $this->year])
        ->andFilterWhere(['like', 'tpkm_group.group_name', $this->group_name]);
        
        return $dataProvider;
    }
}
