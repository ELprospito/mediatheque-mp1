 # Médiathèque IPNET – Catalogue dynamique

Mini-site PHP réalisé dans le cadre du **TP 1 – UE IT 231 – Développement Web I** (Licence, Semestre 3, 2026-2027, IPNET Institute of Technology).

Le site affiche le catalogue de livres d'une médiathèque. Il n'utilise **aucune base de données** : les livres sont stockés dans un tableau PHP (`data/livres.php`).

## Prérequis

- PHP **8.0 ou supérieur** (testé avec PHP 8.2 et 8.3)
- Un serveur local : WampServer, XAMPP, MAMP, ou le serveur intégré de PHP
- Git (pour cloner le dépôt)

## Installation et lancement

### Option 1 : WampServer / XAMPP

1. Cloner le dépôt dans le dossier du serveur :
   ```bash
   cd C:\wamp64\www        # XAMPP : C:\xampp\htdocs
   git clone https://github.com/ELprospito/mediatheque-mp1.git mediatheque-mp1
   ```
2. Démarrer WampServer (icône verte) ou Apache dans XAMPP.
3. Ouvrir <http://localhost/mediatheque-mp1/> dans le navigateur.

### Option 2 : serveur intégré de PHP

```bash
cd mediatheque-mp1
php -S localhost:8000
```

Puis ouvrir <http://localhost:8000>.

## Fonctionnalités réalisées

- **Accueil** (`index.php`) : message de bienvenue, lien vers le catalogue, nombre total de livres et nombre de livres disponibles (calculés en PHP).
- **Catalogue** (`catalogue.php`) : tableau de tous les livres (titre, auteur, année, catégorie, prix, disponibilité) et compteur de livres affichés.
- **Filtrage par catégorie** : liens `catalogue.php?categorie=roman`, vérification du paramètre, message d'erreur si la catégorie n'existe pas, lien « Tous » pour revenir à l'affichage complet.
- **Détail d'un livre** (`detail.php?id=3`) : fiche complète, vérification de l'identifiant (absent, invalide, inexistant) avec message d'erreur propre.
- **À propos** (`apropos.php`) : présentation statique et date du jour affichée par une fonction PHP.
- **Sécurité de base** : toutes les données affichées passent par `htmlspecialchars()` (fonction `e()`), les paramètres GET sont validés.

## Structure du projet

```
mediatheque-mp1/
├── index.php
├── catalogue.php
├── detail.php
├── apropos.php
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── fonctions.php
├── data/
│   └── livres.php
├── css/
│   └── style.css
└── README.md
```

## Fonctions (includes/fonctions.php)

| Fonction | Rôle |
|---|---|
| `afficherLivre(array $livre): string` | Retourne la ligne HTML d'un livre |
| `filtrerParCategorie(array $livres, string $categorie): array` | Filtre les livres d'une catégorie |
| `trouverLivreParId(array $livres, int $id): ?array` | Retourne le livre ou `null` |
| `compterLivresDisponibles(array $livres): int` | Compte les livres disponibles |

Fonctions utilitaires ajoutées : `e()`, `libelleCategorie()`, `formaterPrix()`, `obtenirCategories()`, `dateDuJour()`.

## Auteur

ALAGBO Amour Prosper – IA – Licence 2 – IPNET Institute of Technology
