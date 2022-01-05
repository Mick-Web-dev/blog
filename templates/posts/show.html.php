<div class="row-cols-10 ">
    <h1><?= $post['titre'] ?></h1>
    <p class="text-secondary mb-4"><small ><b>Ecrit le <?= $post['date'] ?></b></small></p>
    <img src="<?= $post['image'] ?>" alt="<?= $post['alt'] ?>">
    <p><i><?= $post['chapo'] ?></i></p>
    <hr>
    <?= $post['contenu'] ?>

    <?php if (count($commentaires) === 0) : ?>
        <h4 class="text-secondary text-center m-5"><i>Il n'y a pas encore de commentaires pour cet article ... Soyez le premier ! </i></h4>
    <?php else : ?>
        <h2>Il y a déjà <?= count($commentaires) ?> réactions : </h2>
        <?php foreach ($commentaires as $commentaire) : ?>
            <h3>Commentaire de <?= $commentaire['auteur'] ?></h3>
            <small>Le <?= $commentaire['date'] ?></small>
            <blockquote>
                <em><?= $commentaire['commentaire'] ?></em>
            </blockquote>
            <a href="delete-comment.php?id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a>
        <?php endforeach ?>
    <?php endif ?>
</div>

<div class="container">
    <div class="form-group align-items-center">
        <form action="save-comment.php" method="POST" class="form-control">
            <h4>Vous voulez réagir ? N'hésitez pas !</h4><br>
            <input type="text" name="auteur" placeholder="Votre pseudo !" class="form-control"><br>
            <textarea name="commentaire" id="" cols="30" rows="10" placeholder="Votre commentaire ..." class="form-control"></textarea><br>
            <input type="hidden" name="post_id" value="<?= $post_id ?>" class="form-control"><br>
            <button class="btn btn-success">Commenter !</button>
        </form>
    </div>
</div>