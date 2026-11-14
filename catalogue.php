<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/fonctions.php';
require_once __DIR__ . '/data/livres.php';

$titrePage      = 'Catalogue';
$categories     = obtenirCategories($livres);
$livresAffiches = $livres;   // par défaut : tous les livres
$categorieActive = '';
$erreur         = null;

// --- Filtrage par catégorie (paramètre GET "categorie") ---
if (isset($_GET['categorie']) && $_GET['categorie'] !== '') {
    $demande = $_GET['categorie'];

    // On vérifie que c'est bien du texte ET une catégorie qui existe
    if (is_string($demande) && in_array(strtolower(trim($demande)), $categories, true)) {
        $categorieActive = strtolower(trim($demande));
        $livresAffiches  = filtrerParCategorie($livres, $categorieActive);
    } else {
        $erreur         = "Cette catégorie n'existe pas.";
        $livresAffiches = [];
    }
}

require __DIR__ . '/includes/header.php';
?>
<h2>Catalogue des livres</h2>

<nav class="filtres" aria-label="Filtrer par catégorie">
    <a href="catalogue.php" class="<?= ($categorieActive === '' && $erreur === null) ? 'actif' : '' ?>">Tous</a>
    <?php foreach ($categories as $categorie): ?>
        <a href="catalogue.php?categorie=<?= e(urlencode($categorie)) ?>"
           class="<?= $categorie === $categorieActive ? 'actif' : '' ?>">
            <?= e(libelleCategorie($categorie)) ?>
        </a>
    <?php endforeach; ?>
</nav>

<?php if ($erreur !== null): ?>
    <p class="message erreur"><?= e($erreur) ?> <a href="catalogue.php">Revenir à l'affichage complet</a></p>
<?php else: ?>
    <p class="compteur"><strong><?= count($livresAffiches) ?></strong> livre(s) affiché(s)</p>

    <div class="tableau-conteneur">
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Année</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Disponibilité</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livresAffiches as $livre): ?>
                    <?= afficherLivre($livre) ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
