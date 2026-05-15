<?php

function findAllOeuvres(PDO $pdo): array
{
    $sql = 'SELECT * FROM oeuvres';

    $paintings = $pdo->query($sql);

    return $paintings->fetchAll();
}