<h1><?= htmlspecialchars($title) ?></h1>

<ul>
    <?php foreach ($entityTypes as $type): ?>
        <li>
            <a href="/articles/<?= htmlspecialchars($type) ?>"><?= ucfirst(htmlspecialchars($type)) ?></a>
        </li>
    <?php endforeach; ?>
</ul>