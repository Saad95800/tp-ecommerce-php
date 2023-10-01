<?php
session_start();

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if(isset($_POST['action']) && $_POST['action'] == 'add' && $_POST['action']){
        $id = $_POST['id'];
        if (isset($_SESSION['products'][$id])) {
            if(isset($_SESSION['cart'][$id])){ // Si le produit est déjà présent dans le panier
                $_SESSION['cart'][$id]['quantity']++;
            }else{ // Si le produit ne se trouve pas dans le panier
                $_SESSION['cart'][$id] = [
                    'title' => $_SESSION['products'][$id]['title'],
                    'quantity' => 1
                ];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container my-5">
    <h1 class="text-center mb-5">Votre Panier</h1>
    <?php if (empty($_SESSION['cart'])) : ?>
        <p class="text-center">Votre panier est vide.</p>
    <?php else : ?>
        <table class="table table-striped shadow-lg">
            <thead class="thead-dark">
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['cart'] as $id => $item) : ?>
                <tr>
                    <td><?php echo $item['title']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="checkout.php" class="btn btn-primary btn-lg">Commander</a>
    <?php endif; ?>
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

h1 {
    font-size: 2.5rem;
}

.table {
    margin-top: 30px;
}

.table thead {
    background-color: #007bff;
    color: white;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 123, 255, 0.05);
}

.btn-lg {
    padding: 10px 40px;
    font-size: 1.2rem;
}

</style>
</body>
</html>
