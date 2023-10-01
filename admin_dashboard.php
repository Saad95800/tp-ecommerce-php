<?php
session_start();

if(!isset($_SESSION['admin_logged_in']) || empty($_SESSION['admin_logged_in']) ){
    header('Location: admin_login.php');
    die;
}

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
$products = isset($_SESSION['products']) ? $_SESSION['products'] : [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Admin</title>
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
      <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
        <li class="nav-item">
          <a class="nav-link" href="admin_logout.php">Déconnexion Admin</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>


<div class="dashboard-section">
    <div class="container">
        <h2 class="mb-4 text-center">Tableau de Bord Admin</h2>
        <div class="card shadow-lg mb-4">
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>Titre</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $id => $product) : ?>
                        <tr>
                            <td><?php echo $product['title']; ?></td>
                            <td>
                                <a href="edit_product.php?id=<?php echo $id; ?>" class="btn btn-info btn-sm">Éditer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="add_product.php" class="btn btn-primary btn-lg">Ajouter un Produit</a>
            </div>
        </div>
    </div>
</div>

<style>
    body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: 'Arial', sans-serif;
}

.dashboard-section {
    background-color: #f8f9fa;
    color: #333333;
    min-height: 100vh;
    padding: 40px 0;
}

.container {
    max-width: 800px;
    margin: auto;
}

h2 {
    font-size: 2.5rem;
}

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: 0.3s;
}

.card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.table thead {
    background-color: #007bff;
    color: white;
}

.btn-lg {
    padding: 10px 40px;
    font-size: 1.2rem;
}

</style>
</body>
</html>
