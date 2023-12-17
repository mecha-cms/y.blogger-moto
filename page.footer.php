<footer>
  <?php

  $author = $page->author;

  if ($author instanceof User) {
      $author = '<a href="' . eat($author->url) . '" rel="author">' . $author . '</a>';
  }

  $time = '<time datetime="' . $page->time->format('c') . '">' . $page->time('%I:%M %p') . '</time>';

  echo '<p>';

  echo i('Posted by %s at %s', [$author, $time]);

  if (isset($state->x->tag)) {
      echo '<br>';
      echo i('Tags') . ': ';
      if (count($tags = $page->tags ?? []) > 0) {
          $links = [];
          foreach ($tags as $tag) {
              $links[] = '<a href="' . eat($tag->link) . '" rel="tag">' . $tag->title . '</a>';
          }
          echo implode(', ', $links);
      } else {
          echo '<span role="status">' . i('Untagged') . '</span>';
      }
  }

  echo '</p>';

  ?>
</footer>