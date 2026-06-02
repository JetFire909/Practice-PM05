<?php 
require 'src/init-login.php';
include 'src/header.php';
?>
    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol id="w2" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        авторизация
                    </li>
                </ol>
            </nav>
            <div class="site-login">
                <h1>Авторизация</h1>

                <!-- КРАСНАЯ ТАБЛИЧКА ОБ ОШИБКЕ БЕЗ КРЕСТИКА -->
                <?php if (isset($error) && !empty($error)): ?>
                    <div class="alert alert-danger" role="alert" style="max-width: 41.66667%; margin-bottom: 20px;">
                        <?= htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-5">
                        <form id="login-form" action="" method="post">
                            <input type="hidden" name="_csrf"
                                value="HXvJ_hFckZo_U4OGA9wD3wPlDEXQOLdkccRmUxtkS7BZNb2sUG_b_GUB7c9um1mzdtU0JpRb3gdBlw8kIgU6-w==">
                            <div class="mb-3 field-loginform-login required">
                                <label class="col-lg-1 col-form-label mr-lg-3" for="loginform-login">логин</label>
                                <input type="text" id="loginform-login" class="col-lg-3 form-control"
                                    name="login" autofocus aria-required="true">
                                <div class="col-lg-7 invalid-feedback"></div>
                            </div>
                            <div class="mb-3 field-loginform-password required">
                                <label class="col-lg-1 col-form-label mr-lg-3" for="loginform-password">пароль</label>
                                <input type="password" id="loginform-password" class="col-lg-3 form-control"
                                    name="password" value="" aria-required="true">
                                <div class="col-lg-7 invalid-feedback"></div>
                            </div>
                            <div class="mb-3 field-loginform-rememberme">
                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="rememberMe" value="0" /><input type="checkbox"
                                        id="loginform-rememberme" class="form-check-input" name="rememberMe"
                                        value="1" checked>
                                    <label class="form-check-label" for="loginform-rememberme">запомнить меня</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="col-lg-7 invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary" name="login-button">
                                        войти
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include 'src/footer.php';?>
