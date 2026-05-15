<?php
    require 'header.php';
    require 'database/bdd.php';
    require 'model/oeuvres.php';

    $pdo     = connexion();
    $oeuvres = findAllOeuvres($pdo);

?>
<div id="liste-oeuvres">
    <?php foreach ($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= htmlspecialchars($oeuvre['id'], ENT_QUOTES, 'UTF-8') ?>">
                <img
                    src="<?= htmlspecialchars($oeuvre['image'], ENT_QUOTES, 'UTF-8') ?>"
                    alt="<?= htmlspecialchars($oeuvre['titre'], ENT_QUOTES, 'UTF-8') ?>"
                >
                <h2><?= htmlspecialchars($oeuvre['titre'], ENT_QUOTES, 'UTF-8') ?></h2>
                <p class="description"><?= htmlspecialchars($oeuvre['artiste'], ENT_QUOTES, 'UTF-8') ?></p>
            </a>
        </article>
    <?php endforeach ?>
</div>

<?php require 'footer.php' ?>