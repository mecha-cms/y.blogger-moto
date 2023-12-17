<?= self::enter(); ?>
<div>
  <main>
    <?= self::alert(); ?>
    <?php if ($page->exist): ?>
      <?php if ($pages->count): ?>
        <?php foreach ($pages as $page): ?>
          <article id="page:<?= eat($page->id); ?>">
            <header>
              <p>
                <time datetime="<?= eat($page->time->format('c')); ?>">
                  <?= $page->time('%A, %B %d, %Y'); ?>
                </time>
              </p>
              <h3>
                <?php if ($link = $page->link): ?>
                  <a href="<?= eat($link); ?>" rel="nofollow" target="_blank">
                    <?= $page->title; ?>
                  </a>
                <?php else: ?>
                  <a href="<?= eat($page->url); ?>">
                    <?= $page->title; ?>
                  </a>
                <?php endif; ?>
              </h3>
            </header>
            <div>
              <?php if ($excerpt = $page->excerpt): ?>
                <?= $excerpt; ?>
              <?php else: ?>
                <p>
                  <?= $page->description; ?>
                </p>
              <?php endif; ?>
            </div>
            <?= self::get('page.footer', ['page' => $page]); ?>
          </article>
        <?php endforeach; ?>
        <?php if (isset($state->x->pager)): ?>
          <?= self::pager('peek'); ?>
        <?php else: ?>
          <?= self::pager(); ?>
        <?php endif; ?>
      <?php else: ?>
        <p role="status">
          <?php if ($site->has('part')): ?>
            <?= i('No more %s to show.', 'posts'); ?>
          <?php else: ?>
            <?= i('No %s yet.', 'posts'); ?>
          <?php endif; ?>
        </p>
      <?php endif; ?>
    <?php else: ?>
      <p role="status">
        <?= i('%s does not exist.', 'Page'); ?>
      </p>
    <?php endif; ?>
  </main>
  <?= self::aside(); ?>
</div>
<?= self::exit(); ?>