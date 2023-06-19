<?php

use koth\View;

/** @var $this View */
?>
<?php if (!empty($tests)): ?>
<main class="section">
    <div class="container">
        <h2 class="title-1">Попярные тесты</h2>
        <ul class="tests">

            <?= $this->getPart('parts/tests_loop',compact('tests')) ?>

        </ul>
    </div>
</main>

<?php endif; ?>
