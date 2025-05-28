<?php
require 'includes/auth.php';
require 'includes/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
$stmt->execute([$id]);

header('Location: dashboard.php');
?>
