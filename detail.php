<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/fonctions.php';
require_once __DIR__ . '/data/livres.php';

$titrePage = 'Détail du livre';
$livre     = null;
$erreur    = null;

// --- Validation du paramètre GET "id" ---
$idBrut = $_GET['id'] ?? null;

if ($idBrut === null || $idBrut === '') {
    $erreur = "Aucun identifiant de livre n'a été fourni.";
    http_response_code(400);
} else {
    // FILTER_VALIDATE_INT renvoie false si ce n'est pas un entier valide
    $id = filter_var($idBrut, FILTER_VALIDATE_INT);

    if ($id === false || $id < 1) {
        $erreur = "L'identifiant fourni est invalide.";
        http_response_code(400);
    } else {
        $livre = trouverLivreParId($livres, $id);
        if ($livre === null) {
            $erreur = "Aucun livre ne correspond à cet identifiant.";
            http_response_code(404);
        } else {
            $titrePage = (string) $livre['titre'];
        }
    }
}

require __DIR__ . '/includes/header.php';
?>
<?php if ($erreur !== null): ?>
    <h2>Livre introuvable</h2>
    <p class="message erreur"><?= e($erreur) ?></p>
<?php else: ?>
    <h2><?= e($livre['titre']) ?></h2>
    <dl class="fiche">
        <dt>Identifiant</dt>   <dd><?= e($livre['id']) ?></dd>
        <dt>Auteur</dt>        <dd><?= e($livre['auteur']) ?></dd>
        <dt>Année</dt>         <dd><?= e($livre['annee']) ?></dd>
        <dt>Catégorie</dt>     <dd><?= e(libelleCategorie((string) $livre['categorie'])) ?></dd>
        <dt>Prix</dt>          <dd><?= e(formaterPrix($livre['prix'])) ?></dd>
        <dt>Disponibilité</dt>
        <dd>
            <?php if ($livre['disponible']): ?>
                <span class="badge badge-oui">Disponible</span>
            <?php else: ?>
                <span class="badge badge-non">Emprunté</span>
            <?php endif; ?>
        </dd>
    </dl>
<?php endif; ?>

<p><a class="bouton" href="catalogue.php">&larr; Retour au catalogue</a></p>
<?php require __DIR__ . '/includes/footer.php'; ?>
