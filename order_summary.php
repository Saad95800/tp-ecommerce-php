<?php
session_start();

if (empty($_SESSION['cart']) || !isset($_SESSION['user_info'])) {
    header('Location: index.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: thank_you.php');
    die;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Récapitulatif de la Commande</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container my-5">
    <h1 class="text-center mb-5">Récapitulatif de la Commande</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg mb-4">
                <div class="card-body">
                    <h2 class="mb-4">Produits</h2>
                    <table class="table table-borderless">
                        <?php foreach ($_SESSION['cart'] as $id => $item) : ?>
                            <tr>
                                <td><?php echo $item['title']; ?></td>
                                <td class="text-right"><?php echo $item['quantity']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            
            <div class="card shadow-lg mb-4">
                <div class="card-body">
                    <h2 class="mb-4">Informations du Client</h2>
                    <p><strong>Prénom:</strong> <?php echo $_SESSION['user_info']['first_name']; ?></p>
                    <p><strong>Nom de famille:</strong> <?php echo $_SESSION['user_info']['last_name']; ?></p>
                    <p><strong>Email:</strong> <?php echo $_SESSION['user_info']['email']; ?></p>
                    <p><strong>Adresse:</strong> <?php echo nl2br($_SESSION['user_info']['address']); ?></p>
                </div>
            </div>
            
            <form action="order_summary.php" method="post">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Procéder au Paiement</button>
            </form>
        </div>
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

h1, h2 {
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: 0.3s;
}

.card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.table {
    margin-top: 30px;
}

.btn-lg {
    padding: 10px 20px;
    font-size: 1.2rem;
}

</style>
</body>
</html>
