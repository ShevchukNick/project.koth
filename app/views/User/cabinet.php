<?php

use koth\View;

/** @var $this View */

?>
<div class="section">
    <div class="container ">
        <div class="row">
            <div class="col-md-12 ">
                <h2 class="">Здраствуй <?php echo $_SESSION['user']['name']; ?> ! </h2>
                <p><a href="/user/credentials" class=" mt-5">Настройки профиля</a></p>
                <p><a href="/user/logout" class=" mt-5">Выход из аккаунта</a></p>
            </div>
        </div>
    </div>
</div>






