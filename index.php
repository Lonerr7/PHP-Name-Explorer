<?php

require __DIR__ . '/inc/all.inc.php';

$char = (string) ($_GET['char'] ?? '');
if (strlen($char) > 1) {
  $char = $char[0];
}
$char = strtoupper($char);

function fetch_names_by_initial($char)
{
  global $pdo;
  $names = [];

  $stmt = $pdo->prepare('SELECT DISTINCT `name` FROM `names` WHERE `name` LIKE :letter ORDER BY `names`.`name` ASC');
  $stmt->bindValue(':letter', "{$char}%");
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($results as $result) {
    $names[] = $result['name'];
  }

  return $names;
}

$names = fetch_names_by_initial($char);

?>
<?php require __DIR__ . '/views/header.php'; ?>

<ul>
  <?php foreach ($names as $name): ?>
    <li>
      <a href="name.php?<?php echo http_build_query(['name' => $name]); ?>">
        <?php echo e($name); ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/views/footer.php'; ?>