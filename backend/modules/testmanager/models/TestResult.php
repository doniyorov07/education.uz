<?php

namespace backend\modules\testmanager\models;

use common\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "test_result".
 *
 * @property int $id
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property int $user_id [int(11)]
 * @property int $duration [smallint(6)]
 * @property int $subject_id [int(11)]
 * @property int $started_at [int(11)]
 * @property int $tests_count [smallint(6)]
 * @property int $correct_answers [smallint(6)]
 * @property int $expire_at [int(11)]
 * @property int $price [int(11)]
 * @property int $finished_at [int(11)]
 *
 *
 * @property-read Subject $subject
 * @property TestResultItem[] $testResultItems
 *
 * @property-read bool $isFinished
 * @property-read bool $isExpired
 * @property-read int $leftTime
 * @property-read Question[] $questions
 * @property-read float|int $percent
 * @property-read mixed $formattedPercent
 * @property-read string $formattedFinishedTime
 * @property-read string $formattedStartedTime
 * @property-read \common\models\User $user
 * @property-read bool $isStarted
 */
class TestResult extends \yii\db\ActiveRecord
{

    const ALLOWED_EXTRA_TIME = 60;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'firstname' => "Ism",
            'lastname' => "Familiya",
            'phone' => 'Tel. raqam',
            'status' => "Holat",
            'created_at' => "Yaratildi",
            'price' => 'Narx',
            'tests_count' => 'Testlar soni',
            'duration' => 'Davomiyligi',
            'started_at' => 'Boshl. vaqti',
            'formattedStartedTime' => 'Boshl. vaqti',
            'finished_at' => 'Tug. vaqti',
            'formattedFinishedTime' => 'Tug. vaqti',
            'correct_answers' => "To'g'ri topildi",
            'formattedPercent' => 'Foiz'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::class, ['id' => 'subject_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestResultItems()
    {
        return $this->hasMany(TestResultItem::className(), ['test_result_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::class, ['id' => 'question_id'])
            ->via('testResultItems');
    }

    /**
     * @return bool
     */
    public function getIsExpired()
    {
        return $this->leftTime <= 0;
    }

    /**
     * @return bool
     */
    public function getIsStarted()
    {
        return $this->started_at != null;
    }

    /**
     * @return bool
     */
    public function getIsFinished()
    {
        return $this->finished_at != null;
    }

    /**
     * Testning tugashiga qolgan vaqt
     * @return int
     */
    public function getLeftTime()
    {
        return $this->expire_at - time();
    }

    /**
     * @throws \yii\db\Exception
     */
    public function prepare()
    {
        $items = $this->testResultItems;
        if (empty($items)) {

            $questions = Question::find()
                ->andWhere(['subject_id' => $this->subject_id])
                ->andWhere(['status' => 1])
                ->orderBy(new Expression('rand()'))
                ->limit($this->tests_count)
                ->all();

            if (empty($questions)) {
                return false;
            }

            $transaction = Yii::$app->db->beginTransaction();

            foreach ($questions as $question) {

                $testResultItem = new TestResultItem();
                $testResultItem->test_result_id = $this->id;
                $testResultItem->question_id = $question->id;

                if (!$testResultItem->save()) {
                    $transaction->rollBack();
                    return false;
                }

            }

            $transaction->commit();
        }
    }

    public function start()
    {
        $this->started_at = time();
        $this->expire_at = $this->started_at + $this->duration * 60;
        $this->save(false);
    }

    /**
     * @param $userAnswers array
     */
    public function saveUserAnswers($userAnswers)
    {
        $correctAnswersCount = 0;

        /** @var TestResultItem[] $items */
        $items = $this->getTestResultItems()
            ->with('question.options')
            ->all();


        foreach ($items as $item) {

            $question = $item->question;
            $options = $question->options;
            $correctAnswer = null;

            foreach ($options as $option) {
                if ($option->is_answer) {
                    $correctAnswer = $option;
                    break;
                }
            }

            $originalAnswerId = $correctAnswer->id ?? null;
            $item->original_answer_id = $originalAnswerId;

            if (isset($userAnswers[$question->id])) {

                $userAnswerId = intval($userAnswers[$question->id]);
                $isCorrect = $originalAnswerId == $userAnswerId;
                $item->user_answer_id = $userAnswerId;
                $item->is_correct = $isCorrect ? 1 : 0;
                if ($isCorrect) {
                    $correctAnswersCount++;
                }
            }

            $item->save();

        }

        $this->correct_answers = $correctAnswersCount;
        $this->finished_at = time();
        $this->save();

    }

    /**
     * @return float|int
     */
    public function getPercent()
    {
        $tests_count = $this->tests_count;
        $correct_answers = $this->correct_answers;
        if (empty($tests_count) || empty($correct_answers)) {
            return 0;
        }

        return $correct_answers / $tests_count;
    }

    /**
     * @return string
     */
    public function getFormattedPercent()
    {
        return Yii::$app->formatter->asPercent($this->percent);
    }


    /**
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function getFormattedFinishedTime()
    {
        return $this->finished_at ? Yii::$app->formatter->asDatetime($this->finished_at) : '';
    }

    /**
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function getFormattedStartedTime()
    {
        return $this->started_at ? Yii::$app->formatter->asDatetime($this->started_at) : '';
    }

    public function getPriceText()
    {
        if ($this->price == 0) {
            return 'Bepul';
        }

        return Yii::$app->formatter->asInteger($this->price) . " so'm";
    }
}
