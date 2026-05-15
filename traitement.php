<?php

require 'database/bdd.php';
require 'model/oeuvres.php';

$pdo = connexion();

    // Check if form is correctly sent with POST method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ajouter.php');
    exit;
}

    // Clean fields before validation
$titre       = strip_tags(trim($_POST['titre']       ?? ''));
$artiste     = strip_tags(trim($_POST['artiste']     ?? ''));
$description = strip_tags(trim($_POST['description'] ?? ''));
$image       = trim($_POST['image'] ?? '');

$errors = [];

    // Title check
if (empty($titre)) {
    $errors[] = 'Le titre est obligatoire.';
}

    // Artist check
if (empty($artiste)) {
    $errors[] = 'Le nom de l\'artiste est obligatoire.';
}

    // Description check
if (strlen($description) < 3) {
    $errors[] = 'La description doit contenir au moins 3 caractères.';
}

    // Picture check
if (!filter_var($image, FILTER_VALIDATE_URL) || !str_starts_with($image, 'https://')) {
    $errors[] = 'Le lien de l\'image doit être une URL valide.';
}

    // Show message if error
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '<p>' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</p>';
    }

    echo '<a href="ajouter.php">Retour au formulaire</a>';
    exit;
}

createOeuvre(
    $pdo,
    $titre,
    $artiste,
    $description,
    $image
);

header('Location: index.php');
exit;