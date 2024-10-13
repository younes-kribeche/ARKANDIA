    <div class="sidebar_container" id='top'>
        <div class="sidebar">
            <div class="toc">
                <h4>Sommaire</h4>
                <ul>
                    <li><a href="#top">Fiche du personnage</a></li>
                    <li><a href="#section1">Chapitre 1 - <?= htmlspecialchars($article->getNameChapter1()) ?></a></li>
                    <li><a href="#section2">Chapitre 2 - </a></li>
                </ul> 
            </div>
        </div>
    </div>
    <div>
        <div class="infobox">
            <?php if ($figure && $figure->getFirstImage()): ?>
                <img src="/images/figures/<?= htmlspecialchars($figure->getFirstImage()['name']) ?>" alt="Image de <?= htmlspecialchars($figure->getName()) ?>">
            <?php endif; ?>
            <div class="infos">
                <p><strong>Prénom</strong>: <?= htmlspecialchars($figure ? $figure->getName() : '' )?></p>
                <p><strong>Nom</strong>: <?= htmlspecialchars($figure ? $figure->getFirstName() : '') ?></p>
                <p><strong>Titres</strong>: <?= htmlspecialchars($figure ? $figure->getTitle() : '') ?></p>
                <p><strong>Race</strong>:</p>
                <p><strong>Age</strong>: <?= htmlspecialchars($figure ? $figure->getAge() : '') ?> ans</p>
                <p><strong>Magie</strong>:</p>
                <p><strong>Armes</strong>:</p>
                <p><strong>Familiers</strong>:</p>
                <p><strong>Royaume</strong>:</p>
                <p><strong>Famille</strong>:</p>
                <p><strong>Alliés</strong>:</p>
                <p><strong>Ennemies</strong>:</p>
            </div>
        </div>
        <div class="container2">
            <div>
                <h1>  
                    <?= htmlspecialchars($figure->getName()) ?> 
                    <?= htmlspecialchars($figure->getFirstName()) ?> 
                    <?= htmlspecialchars($figure->getTitle()) ?>
                </h1>
                <p>
                    <?= htmlspecialchars($figure ? $figure->getDescription() : '') ?>
                </p>
                <h2 id="section1"><?= htmlspecialchars($article->getNameChapter1()) ?></h2>
                <p>
                    <?= nl2br(htmlspecialchars($article->getContentChapter1())) ?>
                </p>
                <h2 id="section2">//Chapitre 2//</h2>
                <p>
                    Integer dapibus, arcu non efficitur vestibulum, nisi orci lacinia velit,
                    eget auctor quam urna non justo. Suspendisse potenti. Cras et luctus
                    libero, non bibendum magna.
                </p>
                <ol>
                    <li>Etape 1</li>
                    <li>Etape 2</li>
                    <li>Etape 3</li>
                </ol>
                <div class="footer">
                    <p>
                        Tout droit reservé, Arkandia vaincra.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Importation de Materialize JS -->
    <script>

    </script>
</body>
</html>
