<?= self::enter(); ?>
<div>
  <main>
    <?= self::alert(); ?>
    <?php if ($page->exist): ?>
      <article id="page:<?= eat($page->id); ?>">
        <header>
          <?php if ($site->has('parent')): ?>
            <p>
              <time datetime="<?= eat($page->time->format('c')); ?>">
                <?= $page->time('%A, %B %d, %Y'); ?>
              </time>
            </p>
          <?php endif; ?>
          <h2>
            <?php if ($link = $page->link): ?>
              <a href="<?= eat($link); ?>" rel="nofollow" target="_blank">
                <?= $page->title; ?>
              </a>
            <?php else: ?>
              <?= $page->title; ?>
            <?php endif; ?>
          </h2>
        </header>
        <div>
          <?= $page->content; ?>
          <?php if ($link): ?>
            <p>
              <a href="<?= eat($link); ?>" rel="nofollow" role="button" target="_blank">
                <?= i('Visit Link'); ?>
              </a>
            </p>
          <?php endif; ?>
        </div>
        <?php if ($site->has('parent')): ?>
          <?= self::get('page.footer'); ?>
        <?php endif; ?>
      </article>
      <?php if (isset($state->x->pager)): ?>
        <?= self::pager('page'); ?>
      <?php endif; ?>
      <?php if ($site->has('parent')): ?>
        <?= self::comments(); ?>
      <?php endif; ?>
    <?php else: ?>
      <article>
        <header>
          <h2>
            <?= i('Error'); ?>
          </h2>
        </header>
        <p role="status">
          <?= i('%s does not exist.', 'Page'); ?>
        </p>
      </article>
    <?php endif; ?>
  </main>
  <?= self::aside(); ?>
</div>
<?= self::exit(); ?>