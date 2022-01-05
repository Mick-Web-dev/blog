<div class="container">
    <div class="row">
        <h1>Nos articles</h1>

        <div class="col col-10">
            <?php foreach ($post as $post) : ?>
                <h2><?= $post['titre'] ?></h2>
                <small>Ecrit le <?= $post['date'] ?></small><br>
                <p><?= $post['chapo'] ?></p>
                <a href="post.php?id=<?= $post['id'] ?>">Lire la suite</a>
                <a href="delete-post.php?id=<?= $post['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
                <br>
                <hr>
            <?php endforeach ?>
        </div>
    </div>
</div>