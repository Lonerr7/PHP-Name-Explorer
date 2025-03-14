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