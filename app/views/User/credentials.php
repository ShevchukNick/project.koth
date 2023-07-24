<section >
    <div class="mask d-flex align-items-center gradient-custom-3">
        <div class="container ">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card m-4">
                        <div class="card-body p-4">
                            <h2 class="text-uppercase text-center mb-4">Изменение учетных данных</h2>
                            <form method="post">

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Адрес электронной почты</label>
                                    <input name="email" type="email" id="email" class="form-control form-control-lg" value="<?= h($_SESSION['user']['email']) ?>" placeholder="" disabled/>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Имя</label>
                                    <input name="name" type="text" id="name" class="form-control form-control-lg" value="<?= h($_SESSION['user']['name']) ?>" placeholder="" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Новый пароль</label>
                                    <input name="password" type="password" id="password" class="form-control form-control-lg" placeholder="" />
                                    <p class="text-muted ">Минимум 6 символов</p>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn ">Сохранить</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

<!--                <div class="col-12 col-md-9 col-lg-7 col-xl-6 ">-->
<!--                    <div class="card m-4 ">-->
<!--                        <div class="card-body p-4 ">-->
<!--                            <h2 class="text-uppercase text-center mb-4">Добавить аватар</h2>-->
<!--                            <form method="post" enctype="multipart/form-data">-->
<!---->
<!--                                <div class="form-outline mb-4">-->
<!--                                    <label class="form-label" for="avatar">Выберите файл</label>-->
<!--                                    <input name="file" type="file" id="avatar" class="form-control form-control-lg" value="" />-->
<!--                                </div>-->
<!---->
<!---->
<!--                                <div class="d-flex justify-content-center">-->
<!--                                    <button type="submit" class="btn " name="set_avatar">Загрузить</button>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->



            </div>
        </div>
    </div>
</section>

