<!--
ici on veut afficher la list des projets réalisés (à la façon des posts
et pouvoir acceder aux détails d'un projet et disposer d'un lien éventuel
vers la page du projet fonctionnel
-->
<?php foreach ($projects as $project) : ?>
<div class="container">
    <div class="row">
        <div class="col col-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title"><?= $project['titre'] ?></h5>
                    <p><?= $project['content_id'] ?></p>
                    <p class="card-text"><?= $project['resume'] ?></p>
                    <a href="index.php" class="btn btn-primary">Aller à l'accueil</a>
                </div>
                <div class="card-footer text-muted"><?= $project['lien'] ?></div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>