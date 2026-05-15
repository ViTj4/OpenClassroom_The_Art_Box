<?php

function findAllOeuvres(PDO $pdo): array
{
    $sql       = 'SELECT * FROM oeuvres';
    $paintings = $pdo->query($sql);
    return $paintings->fetchAll();
}

function findOeuvreById(PDO $pdo, int $id): array|false
{
    $sql  = 'SELECT * FROM oeuvres WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);
    return $stmt->fetch();
}

function createOeuvre(
    PDO    $pdo,
    string $titre,
    string $artiste,
    string $description,
    string $image
): bool {
    $sql = '
        INSERT INTO oeuvres (
            titre,
            artiste,
            description,
            image
        )
        VALUES (
            :titre,
            :artiste,
            :description,
            :image
        )
    ';
    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        'titre' => $titre,
        'artiste' => $artiste,
        'description' => $description,
        'image' => $image
    ]);
}
