<?php

use koth\View;

/** @var $this View */
?>
<?php $this->getPart('parts/nav') ?>


<!--ошибки-->

<div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <?php if (!empty($_SESSION['errors'])): ?>
                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                    <?php echo $_SESSION['errors']; unset($_SESSION['errors']);?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (!empty($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>


        </div>
    </div>
</div>


<?php echo $this->content ?>

<?php $this->getPart('parts/footer') ?>
