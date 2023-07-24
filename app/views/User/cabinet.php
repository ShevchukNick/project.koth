<?php

use koth\View;

/** @var $this View */

?>
<div class="section">
    <div class="container ">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between align-items-center lk-header">
                <div  class="">
                    <h2 class="mb-0">Здраствуй <span class="hi_user"><?php echo $_SESSION['user']['name']; ?> </span> ! </h2>
                    <p class="fs-6 mt-3"><a href="/user/logout" class=" mt-5">Выход из аккаунта</a></p>
                </div>
                <div class="d-flex align-items-center">
                    <?php foreach ($user_score as $k=>$v): ?>
                        <p class="fs-5 me-3 mb-0">Всего очков: <?php echo $v['sum'] ?></p>
                    <?php endforeach; ?>
                    <a href="/user/avatar"><img class="img-avatar" src="<?php echo $_SESSION['user']['img']; ?>" alt=""></a>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">

                    <ul class="d-flex  justify-content-center lk-menu">
                        <li class="lk-menu__item">
                            <a href="/user/credentials" class=" ">Данные учетной записи</a>
                        </li>
                        <li class="lk-menu__item">
                            <a href="/user/passed" class=" ">Пройденые тесты</a>
                        </li>
                    </ul>
            </div>

        </div>
    </div>
</div>






