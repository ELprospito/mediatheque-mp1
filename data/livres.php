<?php
declare(strict_types=1);

/**
 * Données de la médiathèque (aucune base de données à ce stade).
 * Chaque livre : id, titre, auteur, annee, categorie, prix (FCFA), disponible.
 * Les catégories sont écrites en minuscules : elles servent aussi de paramètre d'URL.
 */
$livres = [
    ['id' => 1,  'titre' => "Une si longue lettre",               'auteur' => "Mariama Bâ",           'annee' => 1979, 'categorie' => 'roman',           'prix' => 4500,  'disponible' => true],
    ['id' => 2,  'titre' => "L'Enfant noir",                      'auteur' => "Camara Laye",          'annee' => 1953, 'categorie' => 'roman',           'prix' => 4000,  'disponible' => false],
    ['id' => 3,  'titre' => "Les Soleils des indépendances",      'auteur' => "Ahmadou Kourouma",     'annee' => 1968, 'categorie' => 'roman',           'prix' => 5000,  'disponible' => true],
    ['id' => 4,  'titre' => "Clean Code",                         'auteur' => "Robert C. Martin",     'annee' => 2008, 'categorie' => 'informatique',    'prix' => 25000, 'disponible' => true],
    ['id' => 5,  'titre' => "Introduction à l'algorithmique",     'auteur' => "Thomas H. Cormen",     'annee' => 2010, 'categorie' => 'informatique',    'prix' => 32000, 'disponible' => true],
    ['id' => 6,  'titre' => "Sapiens : une brève histoire de l'humanité", 'auteur' => "Yuval Noah Harari", 'annee' => 2011, 'categorie' => 'histoire',   'prix' => 12000, 'disponible' => false],
    ['id' => 7,  'titre' => "Dune",                               'auteur' => "Frank Herbert",        'annee' => 1965, 'categorie' => 'science-fiction', 'prix' => 9000,  'disponible' => true],
    ['id' => 8,  'titre' => "1984",                               'auteur' => "George Orwell",        'annee' => 1949, 'categorie' => 'science-fiction', 'prix' => 6500,  'disponible' => true],
    ['id' => 9,  'titre' => "Le Crime de l'Orient-Express",       'auteur' => "Agatha Christie",      'annee' => 1934, 'categorie' => 'policier',        'prix' => 5500,  'disponible' => true],
    ['id' => 10, 'titre' => "Histoire de l'Afrique",              'auteur' => "Joseph Ki-Zerbo",      'annee' => 1972, 'categorie' => 'histoire',        'prix' => 15000, 'disponible' => true],
];
