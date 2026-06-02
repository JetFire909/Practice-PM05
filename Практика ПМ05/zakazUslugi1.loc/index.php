<?php 
require 'src/init-index.php'; 
include 'src/header.php'; 
?>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container mt-5">

        <h2 class="text-center mb-4">Отзывы наших клиентов</h2>
         
        <div class="d-flex flex-wrap justify-content-start gap-3">
            <?php if (!empty($reviews)): ?>
                <?php foreach($reviews as $item): ?>
                    <div class="card" style="width: 18rem;">
                        <img src="<?= htmlspecialchars($item['img']) ?>" class="border-0" alt="Фото" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($item['feedback']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center w-100 opacity-50">Отзывов нет</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include 'src/footer.php'; ?>
