<?php
foreach ($posts as $post):
?>
<h2><?= $post->titre() ?></h2>
<time><?= $post->date() ?></time>
<?php endforeach; ?>
