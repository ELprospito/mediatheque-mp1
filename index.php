<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/fonctions.php';
require_once __DIR__ . '/data/livres.php';

$titrePage   = 'Accueil';
$totalLivres = count($livres);                      // nombre total de livres du tableau
$disponibles = compterLivresDisponibles($livres);   // livres actuellement disponibles

require __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <h2>Bienvenue à la Médiathèque IPNET</h2>
    <p>Parcourez notre catalogue de livres : romans, informatique, histoire et bien plus encore.</p>
    <p><a class="bouton" href="catalogue.php">Voir le catalogue</a></p>
</section>

<section class="stats">
    <div class="stat">
        <span class="stat-nombre"><?= e($totalLivres) ?></span>
        <span>livres au catalogue</span>
    </div>
    <div class="stat">
        <span class="stat-nombre"><?= e($disponibles) ?></span>
        <span>livres disponibles</span>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
