<?php if (isset($state->x->search)): ?>
  <?= self::widget([
      'content' => '<search>' . ($content ?? self::form('search', ['route' => $route ?? $state->routeBlog ?? '/article'])) . '</search>',
      'title' => $title ?? i('Search')
  ]); ?>
<?php endif; ?>