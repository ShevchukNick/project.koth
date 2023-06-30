<section >
    <div class="mask d-flex align-items-center gradient-custom-3">
        <div class="container ">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card m-4">
                        <div class="card-body p-4">
                            <h2 class="text-uppercase text-center mb-4">Регистрация</h2>

                            <form method="post">

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Имя</label>
                                    <input name="name" type="text" id="name" class="form-control form-control-lg" value="<?= get_field_value('name') ?>" placeholder=""/>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Адрес электронной почты</label>
                                    <input name="email" type="email" id="email" class="form-control form-control-lg" value="<?= get_field_value('email') ?>" placeholder=""/>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Пароль</label>
                                    <input name="password" type="password" id="password" class="form-control form-control-lg" placeholder=""/>
                                    <p class="text-muted ">Минимум 6 символов</p>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn ">Регистрация</button>
                                </div>

                                <p class="text-center text-muted mt-4 mb-0">Уже есть аккаунт?
                                    <a href="user/login" class="fw-bold text-body"><u>Вход</u></a>
                                </p>

                            </form>

                            <?php if (isset($_SESSION['form-data'])) {
                                unset($_SESSION['form-data']);
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
