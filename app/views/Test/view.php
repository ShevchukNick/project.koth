<?php

use koth\View;

/** @var $this View */

?>
<?php
if (is_array($test_data)) {
    $count_question=count($test_data);
}
?>
<div class="section">
    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <h2 class="title-1">Тест на тему : <?= $test_name['test_name'] ?></h2>

                <ol class="questions text-center">

                    <?php if (isset($test_data)): ?>

                        <?php if (!empty($test_data)): ?>

                            <p class="fs-5">Количество вопросов: <?= $count_question ?></p>

                            <?php foreach ($test_data as $id_question=>$item): // получаем вопрос + ответ ?>
                                <li class="question fs-4 py-4" data-id="<?= $id_question ?>" id="question-<?= $id_question ?>">

                                    <?php foreach ($item as $id_answer=>$answer): ?>
                                        <?php if (!$id_answer): //если ключ ноль, то эт вопрос, выводим вопрос ?>
                                            <h3 class="question__name">
                                                <?= $answer ?>
                                            </h3>
                                        <?php else: //выводим варианты ответов ?>
                                            <ul class="question__answers">
                                                <li class="d-flex justify-content-center">
                                                    <div class="li__item d-flex justify-content-start">
                                                        <input type="radio" id="answer-<?= $id_answer ?>" name="question-<?= $id_question ?>" value="<?= $id_answer ?>">
                                                        <label  for="answer-<?= $id_answer ?>"><?= $answer ?></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        <?php endif; ?>

                                    <?php endforeach; ?>

                                    <div class="mt-4 ms-4">
                                        <button type="submit" class="btn btn-warning">Ответить</button>
                                    </div>

                                </li>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <a href="/tests"> Тест еще не готов. К списку тестов </a>
                        <?php endif; ?>

                    <?php endif; ?>

                </ol>

            </div>
        </div>
    </div>
</div>

