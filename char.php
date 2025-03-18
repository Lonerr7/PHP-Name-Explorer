<?php
require __DIR__ . '/inc/all.inc.php';

$char = $_GET['char'] ?? 'A';
?>

<h2>Page for letter <?php echo e($char); ?></h2>