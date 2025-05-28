<?php
require 'includes/auth.php';
require 'includes/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
$stmt->execute([$id]);
$product = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $pdo->prepare('UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?');
    $stmt->execute([$name, $description, $price, $id]);

    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
    <h2>Edit Product</h2>
    <form method="post">
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
        <textarea name="description"><?= htmlspecialchars($product['description']) ?></textarea>
        <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
        <button type="submit">Update Product</button>
    </form>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
</body>
</html>
