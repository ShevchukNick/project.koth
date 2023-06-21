<?php

use koth\View;

/** @var $this View */
?>
<footer class="footer">
    <div class="container">
        <div class="foot-wrapper">
            <a href="#!"><img src="<?= PATH ?>/assets/img/github-icon.svg"></a>
            <p class="copyright">© 2023 Powered by Shevchuk Nick </p>
        </div>
    </div>
</footer>

<!--</div>-->
<?php $this->getDbLogs(); ?>

<script>
    const PATH='<?= PATH ?>';
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="<?= PATH ?>/assets/js/main.js"></script>
</body>
</html>

