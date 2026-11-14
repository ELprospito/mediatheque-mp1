<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/fonctions.php';

$titrePage = 'À propos';

require __DIR__ . '/includes/header.php';
?>
<h2>À propos de la Médiathèque IPNET</h2>

<p>La médiathèque de l'IPNET Institute of Technology met à disposition des étudiants et des enseignants
   un fonds de livres variés : littérature, informatique, histoire et sciences.</p>
<p>Ce site est un premier projet réalisé dans le cadre de l'UE <strong>IT 231 – Développement Web I</strong>.
   Les données sont stockées dans des tableaux PHP, sans base de données.</p>

<p class="message info">Nous sommes le <strong><?= e(dateDuJour()) ?></strong>.</p>
<?php require __DIR__ . '/includes/footer.php'; ?>
