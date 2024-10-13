<header>
    <nav>
        <div class="nav-wrapper">
            <a href="/" class="">ARKANDIA</a>
            <div class="div_onglets">
                <ul id="" class="onglets">
                    <a href="#!" class="onglet"><p class="onglet-title">MAP</p></a>
                    <a href="#!" class="onglet"><p class="onglet-title">TIMELINE</p></a>
                    <a class="onglet dropdown-trigger" href="#!" data-target="dropdown1">
                        <p class="onglet-title">WIKI <i class="material-icons right">arrow_drop_down</i></p>
                    </a>
                </ul>
                <ul id="dropdown1" class="dropdown-content">
                    <?php
                    $entityTypeTranslations = [
                        'artefact' => 'Artéfacts',
                        'city' => 'Villes',
                        'divinity' => 'Divinité',
                        'figure' => 'Personnages',
                        'flora' => 'Flore',
                        'fona' => 'Faune',
                        'kingdom' => 'Royaumes',
                        'magic' => 'Magies',
                        'monument' => 'Monuments',
                        'pet' => 'Animaux de compagnie',
                        'race' => 'Races',
                        'region' => 'Régions',
                        'religion' => 'Religions'
                    ];

                    foreach ($entityTypeTranslations as $type => $translation):
                    ?>
                        <li><a href="<?= htmlspecialchars($type) ?>"><?= htmlspecialchars($translation) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <ul class="right">
                <li><a href="#!" class="onglet-user">Se connecter</a></li>
                <li><a href="#!" class="onglet-user">S'inscrire</a></li>
            </ul>
            <form class="right" style="margin-right: 20px;">
                <div class="input-field">
                    <input id="search" type="search" required>
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </form>
        </div>
    </nav>
</header>
