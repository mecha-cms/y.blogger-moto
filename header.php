<header>
  <h1>
    <a<?= $site->is('home') ? ' aria-current="page"' : ""; ?> href="<?= eat($url); ?>">
      <?= $site->title; ?>
    </a>
  </h1>
  <?php if ($description = $site->description): ?>
    <p>
      <?= $description; ?>
    </p>
  <?php endif; ?>
</header>