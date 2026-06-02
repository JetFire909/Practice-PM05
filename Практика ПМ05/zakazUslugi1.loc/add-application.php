<?php require 'src/init-add-application.php'; ?>
<?php include 'src/header.php'; ?>
    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if(!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <div class="feedback-index p-3">
                <form id="w0" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_csrf"
                        value="Y8NMvvT3LR7_0FE4QlfcxYPKc6Y2OK44IrCGNdMqbagnjTjstcRneKWCP3EvEIap9vpLxXJbx1sS4-9C6ksc4w==">
                    <div class="mb-3 field-feedback-fio required">
                        <label class="form-label" for="feedback-fio">Выберите дату</label>
                        <input type="date" id="app-date" class="form-control" name="date" value="" aria-required="true">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3 field-feedback-fio required">
                        <label class="form-label" for="feedback-fio">Выберите время посещения</label>
                        <input type="time" id="app-time" class="form-control" name="time" value="" aria-required="true">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3 field-feedback-fio required">
                        <label class="form-label" for="feedback-fio">Причина посещения (кратко)</label>
                        <input type="text" id="feedback-fio" class="form-control" name="reason" value=""  aria-required="true">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3 field-feedback-text required">
                        <label class="form-label" for="feedback-text">Причина посещения (подробно)</label>
                        <textarea id="feedback-text" class="form-control" name="text" 
                            aria-required="true"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">отправить заявку</button>
                    </div>
                </form>
            </div><!-- feedback-index -->
        </div>
    </main>

<?php include 'src/footer.php' ?>