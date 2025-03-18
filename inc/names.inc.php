<?php

declare(strict_types=1);

function get_names_overview() {
  global $pdo;

  $stmt = $pdo->prepare('SELECT `name`, SUM(`count`) AS `sum` FROM `names` GROUP BY `name` ORDER BY `sum` DESC LIMIT 10');
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}