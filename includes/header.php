<?php
// En-tête commun. La page appelante peut définir $titrePage avant l'inclusion.
require_once __DIR__ . '/fonctions.php';

$titrePage  = $titrePage ?? 'Accueil';
$pageActive = basename($_SERVER['SCRIPT_NAME']); // pour surligner le lien courant
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($titrePage) ?> – Médiathèque IPNET</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="site-header">
    <div class="conteneur">
        <h1 class="logo">📚 Médiathèque IPNET</h1>
        <nav>
            <a href="index.php"     class="<?= $pageActive === 'index.php' ? 'actif' : '' ?>">Accueil</a>
            <a href="catalogue.php" class="<?= in_array($pageActive, ['catalogue.php', 'detail.php'], true) ? 'actif' : '' ?>">Catalogue</a>
            <a href="apropos.php"   class="<?= $pageActive === 'apropos.php' ? 'actif' : '' ?>">À propos</a>
        </nav>
    </div>
</header>
<main class="conteneur">
