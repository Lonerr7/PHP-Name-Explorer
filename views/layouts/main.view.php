<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./styles/simple.css" rel="stylesheet">
  <link href="./styles/custom.css" rel="stylesheet">
  <title>Name Explorer</title>
</head>

<body>
  <header>
    <h1>
      <a href="index.php">Name explorer</a>
    </h1>

    <nav>
      <ul>
        <?php foreach ($alphabet as $letter): ?>
          <li>
            <a class="<?php if (!empty($char) && $char === $letter) echo "active"; ?>" href="char.php?<?php echo http_build_query(['char' => $letter]); ?>"><?php echo e($letter); ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </header>

  <main>
    <?php echo $contents ?>
  </main>
</body>

</html>