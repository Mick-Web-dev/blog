<?php
foreach ($posts as $post):
?>
<h2><?= $post->titre() ?></h2>
<p><?= $post->chapo() ?></p>
<time><?= $post->date() ?></time>
    <p><?= $post->auteur() ?></p>
<?php endforeach; ?>
