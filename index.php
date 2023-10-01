<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Ma Boutique</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Boutique</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_dashboard.php">Dashboard Admin</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container my-5">
    <h1 class="text-center mb-5">Bienvenue sur Notre Boutique!</h1>
    <div class="row">
        <?php
        // Check if products already exist in session
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = [
                [
                    'title' => 'Produit 1',
                    'description' => 'Ceci est la description du produit 1.',
                    'image' => 'https://ae01.alicdn.com/kf/S783f5725c2674783bbc6decbdc1eef5fP/T-te-de-Pulv-risateur-Rotative-Universelle-Extension-de-Bras-de-Robot-de-Cuisine-F-05.jpg_.webp',
                    'price' => '€20'
                ],
                [
                    'title' => 'Produit 2',
                    'description' => 'Ceci est la description du produit 2.',
                    'image' => 'https://ae01.alicdn.com/kf/S94e70d77f9a54b8e925ac513731c806c3/Bouteille-d-eau-de-sport-en-plastique-de-grande-capacit-pour-tudiants-bouilloire-de-fitness-en.jpg_.webp',
                    'price' => '€20'
                ],
                [
                    'title' => 'Produit 3',
                    'description' => 'Ceci est la description du produit 3.',
                    'image' => 'https://ae01.alicdn.com/kf/Sf8bc0ee26e774eec803e6bb1f98565c0F/Bas192-Pistolet-eau-de-lavage-de-voiture-buse-de-pulv-risation-lave-auto-haute-pression-3.jpg_.webp',
                    'price' => '€20'
                ],
                [
                    'title' => 'Produit 4',
                    'description' => 'Ceci est la description du produit 4.',
                    'image' => 'https://ae01.alicdn.com/kf/Sf123e0790de84d36b593ee3dcce367acS/Brosse-r-curer-lectrique-avec-perceuse-ensemble-d-accessoires-de-r-ve-brosse-r-curer-pour.jpg_.webp',
                    'price' => '€20'
                ],
                [
                    'title' => 'Produit 5',
                    'description' => 'Ceci est la description du produit 5.',
                    'image' => 'https://ae01.alicdn.com/kf/S401f1933b90245148abe108fce9fa3baG/Trancheuse-multifonctionnelle-avec-panier-coupe-l-gumes-d-chiqueteuses-hachoir-fruits-r-pe-carottes-vert-noir.jpg_.webp',
                    'price' => '€20'
                ],
                [
                    'title' => 'Produit 6',
                    'description' => 'Ceci est la description du produit 6.',
                    'image' => 'https://ae01.alicdn.com/kf/Saa79d97742a24475b59eaf989e5ed12dL/Couvre-chaussures-r-utilisables-en-silicone-non-ald-pour-les-jours-de-pluie-en-plein-air.jpg_.webp',
                    'price' => '€20'
                ],
                [
                    'title' => 'Produit 7',
                    'description' => 'Ceci est la description du produit 7.',
                    'image' => 'https://ae01.alicdn.com/kf/Sc4a8e4c12ea6429c971ec4d6d6faa2e1r/Lunettes-de-soleil-de-v-lo-photochromiques-pour-hommes-et-femmes-verres-argent-s-lunettes-de.jpg_.webp',
                    'price' => '€20'
                ],
                [
                    'title' => 'Produit 8',
                    'description' => 'Ceci est la description du produit 8.',
                    'image' => 'https://ae01.alicdn.com/kf/Sa8f2d6ac72ea4a93997ce2139bc0d542f/Couteau-pliant-avec-manche-en-bois-de-santal-motif-Damas-poche-en-plein-air-chasse-dans.jpg_.webp',
                    'price' => '€20'
                ],
                [
                    'title' => 'Produit 9',
                    'description' => 'Ceci est la description du produit 9.',
                    'image' => 'https://ae01.alicdn.com/kf/S0e29ff3b74034a0a90f4b0502523d504r/D-poussi-reur-air-comprim-sans-fil-portable-avec-lumi-re-LED-souffleur-ordinateur-livres-PC.jpg_.webp',
                    'price' => '€20'
                ],
                [
                    'title' => 'Produit 10',
                    'description' => 'Ceci est la description du produit 10.',
                    'image' => 'https://ae01.alicdn.com/kf/Sb8ac874fd0cd47819191175c5247a1ear/Essager-c-ble-USB-type-c-100W-USB-C-PD-pour-recharge-rapide-cordon-de-chargeur.jpg_.webp',
                    'price' => '€20'
                    ]
            ];
        }

        foreach ($_SESSION['products'] as $id => $product) {
            echo "<div class='col-md-4 mb-4'>
                    <div class='card'>
                        <img src='{$product['image']}' alt='{$product['title']}' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$product['title']}</h5>
                            <p class='card-text'>{$product['description']}</p>
                            <p class='card-text font-weight-bold'>{$product['price']}</p>
                            <a href='product.php?id=$id' class='btn btn-primary mb-2'>Voir Détail</a>
                            <form method='POST' action='cart.php' >
                                <input type='hidden' name='action' value='add' />
                                <input type='hidden' name='id' value='{$id}' />
                                <button type='submit' class='btn btn-success btn-lg'>Ajouter au Panier</button>
                            </form>
                        </div>
                    </div>
                  </div>";
        }
        ?>
    </div>
</div>

<style>
    body {
    background-color: #f8f9fa;
    font-family: 'Arial', sans-serif;
}

.container {
    max-width: 1140px;
    margin: auto;
}

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: 0.3s;
}

.card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card-img-top {
    width: 100%;
    height: auto;
    max-height: 200px;
    object-fit: cover;
}

.btn {
    width: 100%;
}

</style>

</body>
</html>