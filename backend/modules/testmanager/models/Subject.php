<?php

namespace backend\modules\testmanager\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string $name
 * @property int|null $is_free
 * @property int|null $price
 * @property int|null $status
 * @property int $duration [int(11)]  Vaqt (minutlarda)
 * @property int $tests_count [smallint(6)]  Testlar soni
 *
 * @property-read Question[] $questions
 * @property-read int $activeQuestionsCount
 * @property-read string $formattedPrice
 * @property-read string $nameAndPrice
 * @property bool $show_answer [tinyint(1)]
 *
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'duration', 'tests_count'], 'required'],
            [['is_free', 'price', 'status', 'show_answer'], 'integer'],
            [['duration', 'tests_count'], 'integer', 'min' => 10],
            [['name'], 'string', 'max' => 100],
            ['price', 'default', 'value' => 0]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Nomi',
            'is_free' => 'Bepul',
            'price' => 'Narxi',
            'status' => 'Holat',
            'duration' => 'Vaqt davomiyligi (min)',
            'tests_count' => 'Testlar soni',
            'show_answer' => 'Javoblarni ko\'rsatish',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::class, ['subject_id' => 'id']);
    }

    /**
     * @return int
     */
    public function getActiveQuestionsCount()
    {
        return (int)$this->getQuestions()->andWhere(['status' => 1])->count();
    }

    /**
     * @param int $limit
     * @return array|\backend\modules\testmanager\models\Subject[]|\yii\db\ActiveRecord[]
     */
    public function randomTests($limit = 10)
    {
        return $this->getQuestions()
            ->limit($limit)
            ->asArray()
            ->with(['options' => function ($query) {

                /** @var \yii\db\ActiveQuery $query */
                return $query->orderBy(new Expression('rand()'));

            }])
            ->orderBy(new Expression('rand()'))
            ->all();
    }

    public function createTestResult()
    {
        $testResult = new TestResult();
        $testResult->subject_id = $this->id;
        $testResult->user_id = Yii::$app->user->getId();
        $testResult->duration = $this->duration;
        $testResult->price = $this->is_free ? 0 : $this->price;
        $testResult->tests_count = $this->tests_count;

        if ($testResult->save()) {
            return $testResult->id;
        } else {
            return false;
        }
    }

    public function prepareQuestions()
    {

        $transaction = Yii::$app->db->beginTransaction();

        $questions = $this->getQuestions()
            ->orderBy(new Expression('rand()'))
            ->limit($this->tests_count)
            ->andWhere(['status' => 1])
            ->all();

    }


    public function getFormattedPrice()
    {
        if ($this->is_free) {
            return 'Bepul';
        }
        return Yii::$app->formatter->asInteger((int)$this->price) ." so'm";
    }

    public function getNameAndPrice()
    {
        return $this->name . ' (' . $this->getFormattedPrice() . ')';
    }
}
