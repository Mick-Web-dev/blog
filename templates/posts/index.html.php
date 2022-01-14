<div class="container">
    <div class="row">
        <h1 class="text-center text-warning">Blog Posts</h1>
        <hr>
        <br>

        <div class="col col-10">
            <?php foreach ($posts as $post) : ?>
                <h2><?= $post['titre'] ?></h2>
                <small>Ecrit le <?= $post['date'] ?></small><br>
                <p><?= $post['chapo'] ?></p>
                <a href="index.php?controller=post&task=show&id=<?= $post['id'] ?>">Lire la suite</a>
                <a href="index.php?controller=post&task=delete&id=<?= $post['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
                <br>
                <hr>
            <?php endforeach ?>
        </div>
    </div>
</div>