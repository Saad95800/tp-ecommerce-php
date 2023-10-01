<?php
session_start();

// Redirect to index page if user info is not set
if (!isset($_SESSION['user_info'])) {
    header('Location: index.php');
    die;
}

// Optionally, clear the cart and user_info after order is completed
unset($_SESSION['cart']);
unset($_SESSION['user_info']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Merci pour votre achat!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="thank-you-section">
    <div class="container text-center py-5">
        <h1 class="display-4 mb-4">Merci pour votre achat!</h1>
        <p class="lead mb-5">Votre commande a été reçue et sera traitée prochainement.</p>
        <a href="index.php" class="btn btn-primary btn-lg">Retour à la Boutique</a>
    </div>
</div>

<style>
    body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: 'Arial', sans-serif;
}

.thank-you-section {
    background-color: #f8f9fa;
    background-image: url('thank_you_background.jpg'); /* Replace with the path to your background image */
    background-size: cover;
    background-position: center;
    color: #ffffff;
    text-align: center;
    padding: 100px 0;
    min-height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.container {
    background-color: rgba(0, 0, 0, 0.7); /* Black background with 0.7 opacity */
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1.display-4 {
    font-size: 3rem;
    margin-bottom: 20px;
}

.btn-lg {
    padding: 10px 40px;
    font-size: 1.2rem;
}

</style>
</body>
</html>
