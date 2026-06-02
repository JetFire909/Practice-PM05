<?php require 'src/init-application.php'; ?> 
<?php include 'src/header.php' ?>
        <main id="main" class="flex-shrink-0" role="main">
            <div class="container">
                <?php if(!empty($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php elseif(!empty($applicationData)): ?>
                <nav aria-label="breadcrumb">
                    <ol id="w4" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="account.php">заявки</a></li>
                    </ol>
                </nav>
                <div class="application-index">
    
                    <h1>Заявка на посещение</h1>
    
                    <div id="p0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
 
                        <div id="w1" class="list-view">
                            <div class="d-flex flex-wrap justify-content-between layout-card">
                                <div class="item" data-key="<?= htmlspecialchars($applicationData['id'] ?? '') ?>">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h3 class="card-title">
                                               <?= htmlspecialchars($applicationData['reason'] ?? 'Без названия') ?> </h3>
                                            <p class="card-text">
                                                <?= htmlspecialchars($applicationData['text'] ?? '') ?></p>
                                            <div class="card-text">
                                                <div class="opacity-50">
                                                    дата и время посещения:
                                                </div>
                                               <?= htmlspecialchars($applicationData['date'] ?? '') ?>
                                            </div>
                                            <div class="card-text">
                                                <div class="opacity-50">
                                                    дата и время создания:
                                                </div>
                                                <?= htmlspecialchars($applicationData['created_at'] ?? 'Не указано') ?>
                                            </div>
                                            <div class="card-text mb-3">
                                                <div class="opacity-50">
                                                    статус:
                                                </div>
                                                <?php 
                                                $status = $applicationData['status'] ?? 'new';
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
                                            
                                            <a class="btn btn-danger" href="delete-app.php?id=<?= htmlspecialchars($applicationData['id'] ?? '') ?>">отменить</a>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php endif ?>
<?php include 'src/footer.php' ?>
