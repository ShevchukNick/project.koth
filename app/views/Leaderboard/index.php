<?php

use koth\View;

/** @var $this View */

?>
<div class="section">
    <div class="container ">
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Баллы</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>

                    <tr>
                        <td><?= $user['name']; ?></td>
                        <td>???</td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>