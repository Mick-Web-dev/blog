<!--CONTENU DU POST SELECTIONNE-->

<div class="row-cols-10 ">
    <h1><?= $post['titre'] ?></h1>
    <p class="text-secondary mb-4"><small ><b>Ecrit le <?= $post['date'] ?></b></small></p>

    <p><i><?= $post['chapo'] ?></i></p>
    <hr>
    <?= $post['contenu'] ?><br>
    <hr>

<!--LISTE DES COMMENTAIRES PRECEDENTS-->

    <?php if (count($commentaires) === 0) : ?>
        <h4 class="text-secondary text-center m-5"><i>Il n'y a pas encore de commentaires pour cet article ... Soyez le premier ! </i></h4>
    <?php else : ?>
        <h5 class="text-secondary"><?= count($commentaires) ?> réactions : </h5>
        <?php foreach ($commentaires as $commentaire) : ?>
            <h5>Commentaire de <?= $commentaire['auteur'] ?></h5>
            <small>Le <?= $commentaire['date'] ?></small>
            <blockquote class="border m2 p-lg-3 bg-secondary">
                <em><?= $commentaire['commentaire'] ?></em>
            </blockquote>
            <button class="btn btn-danger"><a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)" class="m-3 text-light">Supprimer</a></button>
            <hr>
        <?php endforeach ?>
    <?php endif ?>
</div>

<!--ZONE D4INSERTION D'UN NOUVEAU COMMENTAIRE-->

<div class="container">
    <div class="form-group align-items-center">
        <form action="index.php?controller=comment&task=insert" method="POST" class="form-control">
            <h4>Vous voulez réagir ? N'hésitez pas !</h4><br>

            <input type="text" name="auteur" placeholder="Votre pseudo !" class="form-control">
            <!--
            <?=
            //TODO ->ICI IL FAUT PRÉVOIR DE RENSEIGNER LE PSEUDO DE L'UTILISATEUR CONNECTE
            $user['pseudo']
            ?>
            --><br>
            <textarea name="commentaire" id="" cols="30" rows="3" placeholder="Votre commentaire ..." class="form-control"></textarea><br>
            <input type="hidden" name="post_id" value="<?= $post_id ?>" class="form-control"><br>
            <button class="btn btn-success">Commenter !</button>
        </form>
    </div>
</div>