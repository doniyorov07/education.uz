<?php

namespace backend\modules\testmanager\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\testmanager\models\TestResult;

/**
 * TestResultSearch represents the model behind the search form about `backend\modules\testmanager\models\TestResult`.
 */
class TestResultSearch extends TestResult
{

    public $userFullName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'user_id', 'duration', 'subject_id', 'started_at', 'tests_count', 'correct_answers', 'expire_at', 'price', 'finished_at'], 'integer'],
            [['status', 'userFullName'], 'safe'],
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
        $query = TestResult::find()->joinWith('user');

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
            'test_result.id' => $this->id,
            'test_result.created_at' => $this->created_at,
            'test_result.updated_at' => $this->updated_at,
            'test_result.created_by' => $this->created_by,
            'test_result.updated_by' => $this->updated_by,
            'test_result.user_id' => $this->user_id,
            'test_result.duration' => $this->duration,
            'test_result.subject_id' => $this->subject_id,
            'test_result.started_at' => $this->started_at,
            'test_result.tests_count' => $this->tests_count,
            'test_result.correct_answers' => $this->correct_answers,
            'test_result.expire_at' => $this->expire_at,
            'test_result.finished_at' => $this->finished_at,
        ]);

        if ($this->price == 2) {
            $query->andWhere(['test_result.price' => 0]);
        }

        if ($this->price == 1) {
            $query->andWhere(['>', 'test_result.price', 0]);
        }

        $query->andFilterWhere(['like', 'user.full_name', $this->userFullName]);

        return $dataProvider;
    }
}
