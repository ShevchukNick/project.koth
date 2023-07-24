<main class="section">
    <div class="container">
        <h2 class="title-1">Пройденные тесты</h2>

        <?php if (!$tests) {
        echo 'В разработке';
        }?>

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

    </div>
</main>


