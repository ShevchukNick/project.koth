<!--этот кусок кудоа (вывыд списка тестов хитовых) можно повтороно использововать-->
<?php foreach ($tests as $test): ?>
    <li class="test">
        <a href="test/<?= $test['slug'] ?>">
            <img src="<?= PATH . $test['img'] ?>" alt="" class="test__image">
            <h3 class="test__title"><?= $test['test_name'] ?></h3>
        </a>
    </li>
<?php endforeach; ?>
