    <section class="container">
        <div class="background-layer" id="bg-layer-1"></div>
        <div class="background-layer" id="bg-layer-2"></div>
        <div class="section-carousel">
            <div class="text_bienvenue">
                <h1>BIENVENUE</h1>
            </div>
            <div class="carousel">
            <?php foreach ($figures as $index => $figure): ?>
                <div class="carousel-item figure <?= $index === 0 ? 'active' : '' ?>" 
                     data-background="images/backgrounds/<?= htmlspecialchars($figure->getBackgroundImage()) ?>">
                    <p class="nom_pilier">
                        <?= htmlspecialchars($figure->getName()) ?> 
                        <?= htmlspecialchars($figure->getFirstName()) ?> 
                        <?= htmlspecialchars($figure->getTitle()) ?>
                    </p>
                    <a href="/article/figure/<?= $figure->getId() ?>">
                        <?php 
                        $firstImage = $figure->getFirstImage();
                        if ($firstImage && is_array($firstImage) && isset($firstImage['name'])): 
                            $imageName = htmlspecialchars($firstImage['name']);
                        ?>
                            <img src="images/figures/<?= $imageName ?>" alt="Image de <?= htmlspecialchars($figure->getName()) ?>">
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </section>