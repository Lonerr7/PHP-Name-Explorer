<?php

require __DIR__ . '/inc/all.inc.php';

$name = (string) ($_GET['name'] ?? '');
if (empty($name)) {
  header('Location: index.php');
  die();
}

// Fetching name data
$data = fetch_name_data($name);
?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (!empty($data)): ?>
  <h2>Data about babies born with name <?php echo e($name); ?></h2>
<table>
  <thead>
    <tr>
      <th>Year</th>
      <th>Number of babies born</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $nameData): ?>
      <tr>
        <th><?php echo e($nameData['year']); ?></th>
        <th><?php echo e($nameData['count']); ?></th>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
  <p>No data found</p>
<?php endif; ?>


<?php require __DIR__ . '/views/footer.php'; ?>