<?php

use koth\View;

/** @var $this View */
?>
<!doctype html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->getMeta() ?></title>
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
            <a href="#" class="logo">
                <i class="fa-solid fa-crown"></i>
                King of the history
            </a>
            <ul class="nav-list">
                <li class="nav-list__item"><a href="tests.html" class="nav-list__link ">Тесты</a></li>
                <li class="nav-list__item"><a href="leaderboard.html" class="nav-list__link">Таблица лидеров</a></li>
                <li class="nav-list__item"><i class="search fa-solid fa-magnifying-glass"></i></li>
                <li class="nav-list__item"><a href="#" class="nav-list__link">Вход</a></li>
            </ul>
        </div>
    </div>

</nav>


<header class="header">

    <div class="header__wrapper">
        <h1 class="header__title">
            Стань <strong>королём истории</strong> <br>
        </h1>
        <p class="header_text">Выбери <strong>тест</strong>, реши и докажи что <strong>ТЫ</strong> лучший</p>
        <a href="#tests" class="btn">Выбрать тест</a>
    </div>

</header>