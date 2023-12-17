<?php if (isset($state->x->search)): ?>
  <?= self::widget([
      'content' => $content ?? self::form('search', ['route' => $route ?? $state->routeBlog ?? '/article']),
      'title' => $title ?? i('Search')
  ]); ?>
<?php endif; ?>