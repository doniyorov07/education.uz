<?php
/*
 * @author Shukurullo Odilov
 * @link telegram: https://t.me/yii2_dasturchi
 * @date 27.06.2021, 17:39
 */

/** @var \common\models\test\Question $model */


$options = $model->options;
?>
<div class="pr-2 pl-2">
    <p class="info"><b>Variantlar</b></p>
    <table class="table table-striped table-sm">
        <?php foreach ($options as $option): ?>

            <tr>
                <td style="width: 5%; text-align: center">
                    <?= $option->isAnswerIcon ?>
                </td>
                <td>
                    <?= Yii::$app->formatter->asRaw($option->text) ?>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</div>