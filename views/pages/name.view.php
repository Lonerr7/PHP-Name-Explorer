<h2>Information about the name: <?php echo e($name); ?></h2>

<table>
  <thead>
    <tr>
      <th>Year</th>
      <th>Number of babies born</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($nameData as $entry): ?>
      <tr>
        <td><?php echo e($entry['year']); ?></td>
        <td><?php echo e($entry['count']); ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>