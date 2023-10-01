<?php 
    session_start();

    if (!isset($_GET['id']) || !isset($_SESSION['products'][$_GET['id']])) {
        header('Location: index.php');
        die;
    }

$product_id = $_GET['id'];
$product = $_SESSION['products'][$product_id];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product['title']; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <h2><?php echo $product['title']; ?></h2>
            <p class="text-muted"><?php echo $product['price']; ?></p>
            <p><?php echo $product['description']; ?></p>
            <form method="POST" action="cart.php" >
                <input type="hidden" name="action" value="add" />
                <input type="hidden" name="id" value="<?php echo $product_id; ?>" />
                <button type="submit" class="btn btn-success btn-lg">Ajouter au Panier</button>
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

.img-fluid {
    max-width: 100%;
    height: auto;
    box-shadow: 0px 4px 6px 0px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 2.5rem;
    margin-bottom: 20px;
}

p.text-muted {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.btn-lg {
    padding: 10px 40px;
    font-size: 1.2rem;
}

</style>
</body>
</html>
