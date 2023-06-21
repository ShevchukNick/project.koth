<?php

use koth\View;

/** @var $this View */
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title-1">Тест на тему : <?= $test_name['test_name'] ?></h2>
                <ol class="questions text-center">
                    <!--                    здесб форичеом вывод вопроос в теге ли-->
                    <li class="question fs-4 py-4">
                        <h3 class="question__name">
                            question
                        </h3>
                        <ul class="question__answers">
                            <li class="d-flex justify-content-center">
                                <div class="li__item d-flex justify-content-start">
                                    <input type="radio" id="1" name="" value="">
                                    <label  for="1">answer</label>
                                </div>
                            </li>



                        </ul>
                    </li>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-warning">Ответить</button>
                    </div>
                </ol>


            </div>
        </div>

    </div>
</div>

