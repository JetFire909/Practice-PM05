<?php require 'src/init-admin-reviews.php' ?>
<?php include 'src/header.php'; ?>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        
        <!-- СООБЩЕНИЕ ОБ УСПЕШНОМ ДЕЙСТВИИ -->
        <?php if (isset($_SESSION['review_flash'])): ?>
            <div class="alert alert-success mt-3" role="alert">
                <?= htmlspecialchars($_SESSION['review_flash']); ?>
            </div>
            <?php unset($_SESSION['review_flash']); ?>
        <?php endif; ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Главная</a></li>
                <li class="breadcrumb-item active">модерация отзывов</li>
            </ol>
        </nav>
        
        <div class="application-index">
            <h1>Управление отзывами</h1>

            <div class="mb-3">
                <!-- <a href="admin-reviews.php" class="btn <?= !isset($_GET['only_new']) ? 'btn-primary' : 'btn-outline-primary' ?> btn-sm">Все отзывы</a>
                <a href="admin-reviews.php?only_new" class="btn <?= isset($_GET['only_new']) ? 'btn-primary' : 'btn-outline-primary' ?> btn-sm">Только новые</a> -->
            </div>

            <div class="list-view mt-4">
                <div class="d-flex flex-wrap justify-content-start gap-3">
                    <?php if (!empty($reviews)): ?>
                        <?php foreach($reviews as $item): ?>
                            <?php $reviewStatus = $item['status'] ?? 'pending'; ?>
                            <div class="card" style="width: 18rem;">
                                <?php if(!empty($item['img'])): ?>
                                    <img src="<?= htmlspecialchars($item['img']) ?>" class="border-0" alt="Фото" style="width: 100%;">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($item['name'] ?? '') ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($item['feedback'] ?? '') ?></p>
                                    
                                    <div class="card-text mb-2">
                                        <div class="opacity-50">Статус:</div>
                                        <span class="text-dark">
                                            <?php 
                                            if ($reviewStatus === 'pending') echo 'На рассмотрении';
                                            elseif ($reviewStatus === 'approved') echo 'Опубликован';
                                            elseif ($reviewStatus === 'rejected') echo 'Отклонен';
                                            ?>
                                        </span>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <form action="admin-reviews.php" method="post" class="d-inline">
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            
                                            <?php if($reviewStatus === 'pending'): ?>
                                                <button type="submit" name="action" value="publish" class="btn btn-success btn-sm">Опубликовать</button>
                                                <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Отклонить</button>
                                            <?php elseif($reviewStatus === 'approved'): ?>
                                                <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Отклонить</button>
                                            <?php endif; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <p class="text-center w-100 opacity-50">Отзывов нет</p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'src/footer.php' ?>
