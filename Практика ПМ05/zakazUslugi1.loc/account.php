<?php 
require 'src/init-account.php'; 
// Запускаем сессию, если она еще не запущена, для работы сообщений
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php include 'src/header.php' ?>
        <main id="main" class="flex-shrink-0" role="main">
            <div class="container">
                
                <!-- СООБЩЕНИЕ ОБ УСПЕШНОЙ ОТМЕНЕ ЗАЯВКИ -->
                <?php if (isset($_SESSION['account_flash'])): ?>
                    <div class="alert alert-success mt-3" role="alert">
                        <?= htmlspecialchars($_SESSION['account_flash']); ?>
                    </div>
                    <?php unset($_SESSION['account_flash']); ?>
                <?php endif; ?>

                <nav aria-label="breadcrumb">
                    <ol id="w4" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page">заявки</li>
                    </ol>
                </nav>
                <div class="application-index">
    
                    <h1>заявки</h1>
    
                    <p>
                        <a class="btn btn-success" href="add-application.php">подать заявку</a>
                    </p>
                    <p>
                        <a class="btn btn-primary" href="change-password.php">сменить пароль</a>
                    </p>
    
                    <div id="p0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
                        <div class="application-search">
                            <form id="w0" action="account.php" method="get">
                                <div class="form-group field-applicationsearch-status_id">
                                    <label class="control-label" for="applicationsearch-status_id">статус</label>
                                    <select id="applicationsearch-status_id" class="form-control" name="status_id">
                                        <option value="">выберите статус</option>
                                        <option value="new">Новая</option>
                                        <option value="timereserv">Время забронировано</option>
                                        <option value="timechange">Время изменено</option>
                                        <option value="provided">Завершена</option>
                                    </select>
                                    <div class="help-block"></div>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary">найти</button>
                                    <a class="btn btn-outline-secondary" href="account.php">сбросить</a>
                                </div>
                            </form>
                        </div>
                        <div id="w1" class="list-view mt-4">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <?php foreach($applications as $app): ?>
                                <div class="item col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= htmlspecialchars($app['reason'] ?? '') ?></h5>
                                            <p class="card-text"><?= htmlspecialchars($app['text'] ?? '') ?></p>
                                            <div class="card-text">
                                                <div class="opacity-50">дата и время посещения:</div>
                                                <?= htmlspecialchars($app['date'] ?? '') ?> <?= htmlspecialchars($app['time'] ?? '') ?>
                                            </div>
                                            <div class="card-text">
                                                <div class="opacity-50">дата и время создания:</div>
                                                <?= htmlspecialchars($app['created_at'] ?? '') ?>
                                            </div>
                                            <div class="card-text mb-3">
                                                <div class="opacity-50">статус:</div>
                                                <?php 
                                                $status = $app['status'] ?? 'new';
                                                if ($status === 'new') {
                                                    echo 'Новая';
                                                } elseif ($status === 'timereserv') {
                                                    echo 'Время забронировано';
                                                } elseif ($status === 'timechange') {
                                                    echo 'Время изменено';
                                                } elseif ($status === 'provided') {
                                                    echo 'Завершена';
                                                } else {
                                                    echo htmlspecialchars($status);
                                                }
                                                ?>
                                            </div>
                                            <a class="btn btn-primary" href="application.php?id=<?= $app['id'] ?>">просмотр</a>
                                            <a class="btn btn-danger" href="delete-app.php?id=<?= $app['id'] ?>">отменить</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php include 'src/footer.php' ?>
