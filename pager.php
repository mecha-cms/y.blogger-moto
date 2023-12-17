<nav>
  <?php if ($prev = $pager->prev): ?>
    <a href="<?= eat($prev->link); ?>" rel="prev">
      <?= i('Newer %s', 'Posts'); ?>
    </a>
  <?php else: ?>
    <a aria-disabled="true">
      <?= i('Newer %s', 'Posts'); ?>
    </a>
  <?php endif; ?>
  <?php if ($site->is('home')): ?>
    <a aria-disabled="true">
      <?= i('Home'); ?>
    </a>
  <?php else: ?>
    <a href="<?= eat($url); ?>">
      <?= i('Home'); ?>
    </a>
  <?php endif; ?>
  <?php if ($next = $pager->next): ?>
    <a href="<?= eat($next->link); ?>" rel="next">
      <?= i('Older %s', 'Posts'); ?>
    </a>
  <?php else: ?>
    <a aria-disabled="true">
      <?= i('Older %s', 'Posts'); ?>
    </a>
  <?php endif; ?>
</nav>