<?php

namespace common\models\proposalRevision;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\proposalRevision\ProposalRevisionCommentFile;

/**
 * ProposalRevisionCommentFileSearch represents the model behind the search form about `common\models\proposalRevision\ProposalRevisionCommentFile`.
 */
class ProposalRevisionCommentFileSearch extends ProposalRevisionCommentFile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_p_r_comment'], 'integer'],
            [['file'], 'safe'],
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
        $query = ProposalRevisionCommentFile::find();

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
            'id_p_r_comment' => $this->id_p_r_comment,
        ]);

        $query->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
