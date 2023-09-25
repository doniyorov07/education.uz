<div class="testimonials-wrap">
    <ul class="row  unorderList">
        <?php foreach ($question as $item):?>
            <div class="container">
                <div class="comment-card">
                    <div class="comment-card_pimg">
                        <img src="/user.webp" alt="profile image">
                    </div>
                    <div>
                        <div class="comment-description">
                            <div class="comment-header">
                                <div class="comment-card_profile">
                                    <div class="comment-pname">
                                        Iskandar
                                    </div>

                                </div>
                                <div class="comment-pdate">
                                    <span class="comment-pdat">
                                       <?=$item->date?>
                                      </span>
                                </div>
                            </div>
                            <div class="comment-title">
                                <?=$item->question_text?>
                            </div>
                            <div class="col-lg-8" style="width: 400px">
                                <img src="/question_img/<?=$item->image?>" alt="">
                            </div>
                            <?php foreach ($item->questionAnswers as $answer) :?>
                                <?= $answer->question->id?>
                            <?php endforeach;?>
                        </div>
                        <div class="comment-answer">
                            <div class="comment-bottom">
                                <div>
                                    <button onclick="myFunction()" class="btn  dropdown-toggle">Javoblar</button>
                                </div>
                                <div class="answer-me">
                                    <span><i class="fas fa-reply"></i></span>
                                    <?php if (Yii::$app->user->isGuest): ?>
                                        <a href="/site/login">Javob berish uchun tizimga kiring</a>
                                    <?php else: ?>
                                        <button onclick="myDiv()">Javob berish</button>
                                        <div id="div" style="display: none;">
                                            <?php $form = ActiveForm::begin() ?>
                                            <?= $form->field($models, 'answer_text')->textarea(['rows' => 3]) ?>
                                            <?= $form->field($models, 'question_id')->hiddenInput(['value' => $item->id])->label(false); ?>
                                            <div class="">
                                                <?= Html::submitButton('Yuborish', ['class' => 'btn btn-success']) ?>
                                            </div>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="testimonials_sec" id="myDIV">

                                <p>dsfdsfds</p>
                                <h3>David Malan</h3>
                            </div>
                            <script>
                                function myDiv() {
                                    var x = document.getElementById("div");
                                    if (x.style.display === "block") {
                                        x.style.display = "none";
                                    } else {
                                        x.style.display = "block";
                                    }
                                }
                            </script>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </ul>
</div>