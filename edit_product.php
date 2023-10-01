<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: admin_login.php');
    exit();
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
if ($id === null || !isset($_SESSION['products'][$id])) {
    header('Location: admin_dashboard.php');
    exit();
}
$product = $_SESSION['products'][$id];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product['title'] = $_POST['title'];
    $product['description'] = $_POST['description'];
    $product['image'] = $_POST['image'];
    $product['price'] = $_POST['price'];

    $_SESSION['products'][$id] = $product;
    header('Location: admin_dashboard.php');
    die;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Éditer le Produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="edit-product-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="mb-4 text-center">Éditer le Produit</h2>
                        <form action="edit_product.php?id=<?php echo $id; ?>" method="post">
                            <div class="form-group">
                                <label for="title">Titre:</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($product['title'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($product['description'] ?? ''); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Prix:</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="form-group">
                                <label for="image">URL de l'Image:</label>
                                <input type="text" class="form-control" id="image" name="image" value="<?php echo htmlspecialchars($product['image'] ?? ''); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Mettre à jour</button>
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

.edit-product-section {
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

.btn-lg {
    padding: 10px 40px;
    font-size: 1.2rem;
}

</style>
</body>
</html>
