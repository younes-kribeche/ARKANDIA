<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biography</title>
    <link rel="stylesheet" href="/styles/index.css">
    <link rel="stylesheet" href="/styles/global.css">
    <link rel="stylesheet" href="/styles/show_article.css">
    <link rel="stylesheet" href="/styles/404.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
    <script src="scripts/dropdown_header.js" defer></script>
    <script src="scripts/carousel.js" defer></script>
    <script src="scripts/background_image_change.js" defer></script>
</head>
<body>

<!-- Header -->
<?php include __DIR__ . '/header.php'; ?>

<!-- Contenu principal -->
<main>
    <?php echo $content; ?>
</main>

<!-- Footer -->
</body>
</html>