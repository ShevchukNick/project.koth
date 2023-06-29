<h2 class="title-1 mt-4 mb-4">Результаты поиска:</h2>
<?php if ($tests): ?>
    <ul class="tests">
        <?php foreach ($tests as $test): ?>
            <li class="test">
                <a href="test/<?= $test['slug'] ?>">
                    <img src="<?= PATH . $test['img'] ?>" alt="" class="test__image">
                    <h3 class="test__title"><?= $test['test_name'] ?></h3>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

<?php else: ?>

<p class="text-center fs-3 mt-5">По запросу ничего не найдено</p>

<?php endif; ?>

