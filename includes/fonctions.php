<?php
declare(strict_types=1);

/**
 * Fonctions utilitaires de la médiathèque IPNET.
 */

/**
 * Échappe une valeur avant de l'afficher dans du HTML (protection XSS).
 */
function e(mixed $valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES, 'UTF-8');
}

/**
 * Transforme "science-fiction" en "Science fiction" pour l'affichage.
 */
function libelleCategorie(string $categorie): string
{
    return ucfirst(str_replace('-', ' ', $categorie));
}

/**
 * Formate un prix : 25000 devient "25 000 FCFA".
 */
function formaterPrix(int|float $prix): string
{
    return number_format($prix, 0, ',', ' ') . ' FCFA';
}

/**
 * Retourne la ligne HTML (<tr>) d'un livre, toutes les données sont échappées.
 */
function afficherLivre(array $livre): string
{
    $estDisponible = (bool) $livre['disponible'];
    $statut        = $estDisponible ? 'Disponible' : 'Emprunté';
    $classe        = $estDisponible ? 'badge badge-oui' : 'badge badge-non';

    return sprintf(
        '<tr>'
        . '<td><a href="detail.php?id=%d">%s</a></td>'
        . '<td>%s</td>'
        . '<td>%s</td>'
        . '<td>%s</td>'
        . '<td>%s</td>'
        . '<td><span class="%s">%s</span></td>'
        . '</tr>',
        (int) $livre['id'],
        e($livre['titre']),
        e($livre['auteur']),
        e($livre['annee']),
        e(libelleCategorie((string) $livre['categorie'])),
        e(formaterPrix($livre['prix'])),
        $classe,
        $statut
    );
}

/**
 * Retourne uniquement les livres d'une catégorie donnée.
 */
function filtrerParCategorie(array $livres, string $categorie): array
{
    $resultat = array_filter(
        $livres,
        fn(array $livre): bool => $livre['categorie'] === $categorie
    );

    return array_values($resultat); // réindexe le tableau (0, 1, 2...)
}

/**
 * Cherche un livre par son id. Retourne null s'il n'existe pas.
 */
function trouverLivreParId(array $livres, int $id): ?array
{
    foreach ($livres as $livre) {
        if ($livre['id'] === $id) {
            return $livre;
        }
    }

    return null;
}

/**
 * Compte les livres actuellement disponibles.
 */
function compterLivresDisponibles(array $livres): int
{
    return count(array_filter($livres, fn(array $livre): bool => $livre['disponible']));
}

/**
 * Liste des catégories existantes (sans doublon, triées).
 */
function obtenirCategories(array $livres): array
{
    $categories = array_unique(array_column($livres, 'categorie'));
    sort($categories);

    return array_values($categories);
}

/**
 * Date du jour en français, ex. "Vendredi 13 novembre 2026".
 */
function dateDuJour(): string
{
    $jours = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
    $mois  = [1 => 'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
              'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];

    $maintenant = new DateTimeImmutable('now', new DateTimeZone('Africa/Lome'));

    return ucfirst($jours[(int) $maintenant->format('w')])
        . ' ' . $maintenant->format('j')
        . ' ' . $mois[(int) $maintenant->format('n')]
        . ' ' . $maintenant->format('Y');
}
