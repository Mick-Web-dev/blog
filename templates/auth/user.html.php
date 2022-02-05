<?php    ?>
<!--Synthèse de l'activité du site-->
<div class="row align-items-center align-content-center justify-content-center">
    <h1 class="bg-secondary text-center text-light p-2 mb-5">DASHBOARD</h1>
    <div class="col-6 text-center  align-items-center justify-items-center m-1 p-0">
        <!--Liste des utilisateurs-->
        <img src="../../images/avartar-webdev47.png" class="rounded-circle bg-danger mt-1" alt="avatar" width="150px">
        <h2 class="text-danger">Admin</h2>
        <p>Informations du compte Administrateur</p>
        <em>Nom, prenom, adresse email</em><br>
        <a href="index.php?controller=user&task=compte&id=" type="button" class="btn btn-danger border border-light w-25 align-items-center justify-content-center m-1">Modifier</a>
    </div>

    <div class="col-5 align-items-center justify-content-center m-1">
        <div class="col-2 border border-light">
            <div class="card text-center" style="width: 15rem;">
                <div class="card-body">
                    <h5 class="text-warning">Articles</h5>
                    <h5>
                        <!--nbre d'articles-->
                        2
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-2 border border-light">
            <div class="card " style="width: 15rem;">
                <div class="card-body text-center">
                    <h5 class="text-success">Commentaires</h5>
                    <h5>
                        <!--nbre d'articles-->
                        2
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-2 border border-light ">
            <div class="card" style="width: 15rem;">
                <div class="card-body text-center">
                    <h5 class="text-primary">Utilisateurs</h5>
                    <h5>
                        <!--nbre d'articles-->
                        2
                    </h5>
                </div>
            </div>
        </div>
    </div>


    <div class="row align-items-center align-content-center justify-content-center justify-items-center">
        <!--Liste des utilisateurs-->
        <div class="row  bg-secondary d-flex align-items-end justify-content-center p-3 mt-5">
            <h4 class="text-center text-light"><em>Gestion :</em></h4>
            <?php // if(isset($_SESSION['user']['role:admin'])): ?>
            <a href="index.php?controller=user&task=comment" type="button" class="btn btn-success border border-light w-25 d-flex align-items-end justify-content-center m-1"><b>COMMENTAIRES</b></a>
            <a href="index.php?controller=user&task=users" type="button" class="btn btn-primary border border-light w-25 d-flex align-items-end justify-content-center m-1"><b>UTILISATEUR</b></a>
            <a href="index.php?controller=user&task=articles" type="button" class="btn btn-warning border border-light w-25 d-flex align-items-end justify-content-center m-1"><b>ARTICLES</b></a>
            <?php// endif; ?>
        </div>
    </div>
</div>





