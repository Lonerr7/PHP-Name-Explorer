<h2>Top 10 most popular names</h2>
<ol>
  <!-- entry: $name, $count -->
  <?php foreach ($overview as $entry): ?>
    <li>
      <a href="#"><?php echo e($entry['name']); ?></a>
    </li>
  <?php endforeach; ?>
</ol>