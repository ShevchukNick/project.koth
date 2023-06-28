<?php

use koth\View;

/** @var $this View */

?>
<div class="section">
    <div class="container ">
        <div class="row ">
            <div class="col-md-12 text-center">
                <h2 class="title-name-test">Тест на тему : <?= $test_name['test_name'] ?></h2>

                <?php if (isset($test_data)): ?>

                    <?php if (!empty($test_data)): ?>
                        <p>Правила прохождения теста: <br> не обновляй страницу <br> перелючаться между вопросами можно с помощью навигации в виде цифр <br> когда выберешь все вопролсы нажми на книпку закочить
                            <br> вопросы ан которые нет ответа считаются отвечеными нерпаильно </p>
                          <div class="mt-5">
                            <button type="submit" class="btn btn-warning start-test">Начать тест</button>
                          </div>

                <div class="abra">  <!-- 27.06 -->



                        <?= $pagination ?>
                        <span class="none" id="test-id"><?= $test_name['id'] ?></span>

                        <div class="test-data">

<!--                            <p class="fs-5">Всего вопросов: --><?php //= $count_question ?><!--</p>-->

                            <?php foreach ($test_data as $id_question => $item): // получаем вопрос + ответ ?>

                                <div class="question fs-4 py-4" data-id="<?= $id_question ?>"
                                     id="question-<?= $id_question ?>">


<!--                                    <div class="question__count me-4 fs-6 mb-4">Вопрос <span class="current">--><?php //= $id_question ?><!--</span> из <span class="total">--><?php //= $count_question ?><!--</span></div>-->


                                    <?php foreach ($item as $id_answer => $answer): ?>
                                        <?php if (!$id_answer): //если ключ ноль, то эт вопрос, выводим вопрос ?>
                                            <h3 class="question__name mb-4">
                                                <?= $answer ?>
                                            </h3>
                                        <?php else: //выводим варианты ответов ?>
                                            <div class="answers-wrapper d-flex justify-content-center">
                                                <div class="li__item d-flex justify-content-start">
                                                    <input type="radio" id="answer-<?= $id_answer ?>"
                                                           name="question-<?= $id_question ?>"
                                                           value="<?= $id_answer ?>">
                                                    <label for="answer-<?= $id_answer ?>"><?= $answer ?></label>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                </div>

                            <?php endforeach; ?>

                            <div class="mt-4 ">
                                <button type="submit" class="btn btn-warning end-test" id="end-test">закончить</button>
                            </div>

                        </div>

                    </div>

                    <?php else: ?>
                        <a href="/tests"> Тест еще не готов. К списку тестов </a>
                    <?php endif; ?>

                <?php endif; ?>


            </div>
        </div>
    </div>
</div>

