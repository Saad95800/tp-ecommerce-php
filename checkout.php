<?php
session_start();

if (empty($_SESSION['cart'])) {
    header('Location: cart.php');
    die;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_SESSION['user_info'] = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
    ];

    header('Location: order_summary.php');
    die;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Passer à la Commande</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container my-5">
    <h1 class="text-center mb-5">Informations de Livraison</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form action="checkout.php" method="post">
                        <div class="form-group">
                            <label for="first_name">Prénom:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Nom de famille:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Adresse:</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Passer à la Commande</button>
                    </form>
                </div>
            </div>
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

h1 {
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

.btn-lg {
    padding: 10px 20px;
    font-size: 1.2rem;
}

</style>
</body>
</html>
