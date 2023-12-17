<div>
  <?php if (!empty($title)): ?>
    <h3>
      <?= $title; ?>
    </h3>
  <?php endif; ?>
  <?= !empty($content) ? $content : ""; ?>
</div>