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
                King of the history
            </a>
            <ul class="nav-list">
                <li class="nav-list__item"><i class="search fa-solid fa-magnifying-glass"></i></li>
                <li class="nav-list__item"><a href="/tests" class="nav-list__link ">Тесты</a></li>
                <li class="nav-list__item"><a href="#" class="nav-list__link">Таблица лидеров</a></li>
                <li class="nav-list__item"><a href="#" class="nav-list__link">Вход</a></li>
            </ul>
        </div>
    </div>

</nav>
