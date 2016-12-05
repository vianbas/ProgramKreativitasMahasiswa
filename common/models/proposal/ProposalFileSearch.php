<?php

namespace common\models\proposal;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\proposal\ProposalFile;

/**
 * ProposalFileSearch represents the model behind the search form about `common\models\proposal\ProposalFile`.
 */
class ProposalFileSearch extends ProposalFile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proposal_revision'], 'integer'],
            [['file_location', 'uploaded_at'], 'safe'],
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
        $query = ProposalFile::find();

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
            'id_proposal_revision' => $this->id_proposal_revision,
            'uploaded_at' => $this->uploaded_at,
        ]);

        $query->andFilterWhere(['like', 'file_location', $this->file_location]);

        return $dataProvider;
    }
}
