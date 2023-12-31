<?php

use koth\View;

/** @var $this View */
?>
<!doctype html>
<html lang="en">
<head>
    <base href="<?= base_url() ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->getMeta() ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/main.css">
</head>
<body>

<!--<div class="wrapper">-->

<nav class="nav">
    <div class="container">
        <div class="nav-row">
            <a href="<?= base_url() ?>" class="logo">
                <i class="fa-solid fa-crown"></i>
                king of the history
            </a>
            <ul class="nav-list">
                <li class="nav-list__item">
                    <a href="search" class="open-search"><i class="fas fa-search"></i></a>
                </li>
                <li class="nav-list__item"><a href="tests" class="nav-list__link ">Тесты</a></li>
                <li class="nav-list__item"><a href="leaderboard" class="nav-list__link">Таблица лидеров</a></li>
                <?php if (empty($_SESSION['user'])): ?>
                    <li class="nav-list__item"><a href="user/login" class="nav-list__link">Вход</a></li>
                <?php else: ?>


                    <div class="dropdown">
                        <button class=" dropdown-toggle" type="button" id="dropdownMenuButton2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center"><p class="m-0 me-2"><?= $_SESSION['user']['name'] ?></p>
                                <img class="dropdown__img" src="<?= $_SESSION['user']['img'] ?>"></div>

                        </button>
                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item " href="user/cabinet">Профиль</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="user/credentials">Настройки профиля</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="user/logout">Выход</a></li>
                        </ul>
                    </div>

                <?php endif; ?>
            </ul>
        </div>
    </div>

</nav>
