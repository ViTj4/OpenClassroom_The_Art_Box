<?php
    require 'header.php';
    require 'database/bdd.php';
    require 'model/oeuvres.php';

    // Redirect to main page if there is no id
    if (empty($_GET['id'])) {
        header('Location: index.php');
        exit;
    }

    $pdo = connexion();
    $id  = intval($_GET['id']);
    $oeuvre = findOeuvreById($pdo, $id);

    // Redirect to main page if doesn't exist
    if (!$oeuvre) {
        header('Location: index.php');
        exit;
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img
            src="<?= htmlspecialchars($oeuvre['image'], ENT_QUOTES, 'UTF-8') ?>"
            alt="<?= htmlspecialchars($oeuvre['titre'], ENT_QUOTES, 'UTF-8') ?>"
        >
    </div>
    <div id="contenu-oeuvre">
        <h1><?= htmlspecialchars($oeuvre['titre'], ENT_QUOTES, 'UTF-8') ?></h1>
        <p class="description"><?= htmlspecialchars($oeuvre['artiste'], ENT_QUOTES, 'UTF-8') ?></p>
        <p class="description-complete">
            <?= htmlspecialchars($oeuvre['description'], ENT_QUOTES, 'UTF-8') ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>