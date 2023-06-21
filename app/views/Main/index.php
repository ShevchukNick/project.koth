<?php

use koth\View;

/** @var $this View */
?>
<?php $this->getPart('parts/header') ?>

<?php if (!empty($tests)): ?>
<main class="section">
    <div class="container">
        <h2 class="title-1">Популярные тесты</h2>
        <ul class="tests">

            <?= $this->getPart('parts/tests_loop',compact('tests')) ?>

        </ul>
    </div>
</main>

<?php endif; ?>
