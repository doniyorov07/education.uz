<?php
/*
 * @author Shukurullo Odilov
 * @link telegram: https://t.me/yii2_dasturchi
 * @date 26.06.2021, 8:59
 */

namespace backend\modules\testmanager\models\traits;

use Yii;
use backend\modules\testmanager\models\Option;
use yii\helpers\ArrayHelper;
use yii\base\Model;

trait QuestionDynamicFormTrait
{

    /**
     * @param $modelsOptions Option[]
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function insertMultiple($modelsOptions = [])
    {
        $modelsOptions = $this->createMultiple($modelsOptions);
        Model::loadMultiple($modelsOptions, Yii::$app->request->post());

        // validate all models
        $valid = $this->validate();
        $valid = Model::validateMultiple($modelsOptions) && $valid;

        if ($valid) {
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                if ($flag = $this->save(false)) {

                    $isAnswerKey = Yii::$app->request->post('is_answer');

                    foreach ($modelsOptions as $key => $modelOption) {

                        // set `is_answer` attribute value
                        $modelOption->is_answer = $key == $isAnswerKey;
                        $modelOption->question_id = $this->id;
                        if (!($flag = $modelOption->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }
                }
                if ($flag) {
                    $transaction->commit();
                    return true;
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
            }
        }
        return false;
    }

    /**
     * @param $modelsOption Option[]
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function updateMultiple($modelsOption)
    {
        $oldIDs = ArrayHelper::map($modelsOption, 'id', 'id');
        $modelsOption = $this->createMultiple($modelsOption);
        Model::loadMultiple($modelsOption, Yii::$app->request->post());

        $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsOption, 'id', 'id')));

        // validate all models
        $valid = $this->validate();
        $valid = Model::validateMultiple($modelsOption) && $valid;

        if ($valid) {
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                if ($flag = $this->save(false)) {
                    if (!empty($deletedIDs)) {
                        Option::deleteAll(['id' => $deletedIDs]);
                    }

                    $isAnswerKey = Yii::$app->request->post('is_answer');

                    foreach ($modelsOption as $key => $modelOption) {
                        $modelOption->is_answer = $key == $isAnswerKey;
                        $modelOption->question_id = $this->id;
                        if (!($flag = $modelOption->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }
                }
                if ($flag) {
                    $transaction->commit();
                    return true;
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
            }
        }

        return false;
    }

    /**
     * @param Option[] $optionModels
     * @return Option[]
     * @throws \yii\base\InvalidConfigException
     */
    public function createMultiple($optionModels = [])
    {
        $model = new Option();
        $formName = $model->formName();
        $post = Yii::$app->request->post($formName);
        $models = [];

        if (!empty($optionModels)) {
            $keys = array_keys(ArrayHelper::map($optionModels, 'id', 'id'));
            $optionModels = array_combine($keys, $optionModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['id']) && !empty($item['id']) && isset($optionModels[$item['id']])) {
                    $models[] = $optionModels[$item['id']];
                } else {
                    $models[] = new Option();
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }

}