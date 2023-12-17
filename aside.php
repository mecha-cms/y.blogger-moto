<aside>
  <?= self::widget('form/search'); ?>
  <?php if ($site->is('home')): ?>
    <?= self::widget('page/random'); ?>
  <?php else: ?>
    <?= self::widget('page/recent'); ?>
    <?php if ($site->has('parent') && $site->is('page')): ?>
      <?= self::widget('page/relate'); ?>
    <?php endif; ?>
  <?php endif; ?>
  <?= self::widget('page/popular'); ?>
  <?= self::widget('tag'); ?>
  <?= self::widget('archive'); ?>
</aside>