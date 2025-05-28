<?php
require 'includes/auth.php';
require 'includes/db.php';

$stmt = $pdo->query('SELECT * FROM products');
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
    <h2>Product Dashboard</h2>
    <a href="add_product.php">Add New Product</a> | 
    <a href="logout.php">Logout</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= htmlspecialchars($product['description']) ?></td>
                <td><?= htmlspecialchars($product['price']) ?></td>
                <td>
                    <a href="edit_product.php?id=<?= $product['id'] ?>">Edit</a> | 
                    <a href="delete_product.php?id=<?= $product['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
