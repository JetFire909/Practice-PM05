<?php require 'src/init-change-password.php'; ?>
<?php include 'src/header.php'; ?>
    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if(!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <?php if(!empty($flash)):?>
            <div class="alert alert-success"><?= $flash ?></div>
            <?php endif ?>
            <div class="feedback-index p-3">
                <form id="w0" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_csrf"
                        value="Y8NMvvT3LR7_0FE4QlfcxYPKc6Y2OK44IrCGNdMqbagnjTjstcRneKWCP3EvEIap9vpLxXJbx1sS4-9C6ksc4w==">
                    <div class="mb-3 field-feedback-fio required">
                        <label class="form-label" for="feedback-fio">Введите текущий пароль </label>
                        <input type="password" id="app-current-password" class="form-control" name="old_password" value="" aria-required="true">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3 field-feedback-fio required">
                        <label class="form-label" for="feedback-fio">Введите новый пароль</label>
                        <input type="password" id="app-new-password" class="form-control" name="new_password" value="" aria-required="true">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3 field-feedback-fio required">
                        <label class="form-label" for="feedback-fio">Подтветрдите новый пароль</label>
                        <input type="password" id="app-retype-password" class="form-control" name="confirm_password" value=""  aria-required="true">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">изменить пароль</button>
                    </div>
                </form>
            </div><!-- feedback-index -->
        </div>
    </main>

<?php include 'src/footer.php' ?>