<?php

use koth\View;

/** @var $this View */

?>
<div class="section">
    <div class="container ">
        <div class="row">
            <!--            <table class="table">-->
            <!--                <thead>-->
            <!--                <tr>-->
            <!--                    <th scope="col">Позиция</th>-->
            <!--                    <th scope="col">Имя</th>-->
            <!--                    <th scope="col">Счёт</th>-->
            <!--                </tr>-->
            <!--                </thead>-->
            <!--                <tbody>-->
            <!--                --><?php //foreach ($users as $user): ?>
            <!--                --><?php //$count=1 ?>
            <!--                    <tr>-->
            <!--                        <td>--><?php //= $count++ ?><!--</td>-->
            <!--                        <td>--><?php //= $user['name']; ?><!--</td>-->
            <!--                        <td>--><?php //= $user['sum']; ?><!--</td>-->
            <!--                    </tr>-->
            <!--                --><?php //endforeach; ?>
            <!---->
            <!--                </tbody>-->
            <!--            </table>-->
            <h2 class="title-1">Таблица лидеров</h2>

                <div class="container-lb">
                    <?php foreach ($users as $user): ?>
                        <div class="leaderboard-row   m-3">
                            <div class="leaderboard-item__img ">
                                <img class="" style="width: 80px" " src="<?php echo $user['img']; ?>" alt="">
                            </div>
                            <div class="leaderboard-item__name ">
                                <?= $user['name']; ?>
                            </div>
                            <div class="leaderboard-item__sum ">
                                <?= $user['sum']; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>


        </div>
    </div>
</div>