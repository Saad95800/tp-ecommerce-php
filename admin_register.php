<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!isset($_SESSION['admin_credentials'])){
        $_SESSION['admin_credentials'] = [];
    }
    $_SESSION['admin_credentials'][$username] = $password;

    header('Location: admin_login.php');
    die;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="register-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="mb-4 text-center">Inscription Admin</h2>
                        <form action="admin_register.php" method="post">
                            <div class="form-group">
                                <label for="username">Nom d'utilisateur:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-lg">S'inscrire</button>
                        </form>
                    </div>
                </div>
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

.register-section {
    background-color: #f8f9fa;
    color: #333333;
    min-height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.container {
    max-width: 1140px;
}

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: 0.3s;
}

.card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

h2 {
    font-size: 2.5rem;
}

.btn-lg {
    padding: 10px 20px;
    font-size: 1.2rem;
}

</style>
</body>
</html>
