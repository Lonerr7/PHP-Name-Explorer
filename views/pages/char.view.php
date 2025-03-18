<ul>
  <?php foreach ($names as $name): ?>
    <li>
      <a href="name.php?<?php echo http_build_query(['name' => $name]); ?>">
        <?php echo e($name); ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>

<ul class="pagination">
  <?php for ($i = 1; $i <= ceil($pagination['totalNamesCount'] / $pagination['limit']); $i++): ?>
    <li class="pagination__item">
      <a class="button" href="char.php?<?php echo http_build_query(['char' => $char, 'page' => $i]); ?>"><?php echo e($i); ?></a>
    </li>
  <?php endfor; ?>
</ul>