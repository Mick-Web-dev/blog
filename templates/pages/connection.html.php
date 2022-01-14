<!--
ici on veut permettre à l'utilisateur enregistré:
de se connecter
et en fonction de ses droits soit :
- de commenter uniquement des posts
- de creer, supprimer, ou mettre a jour des posts
- de valider les commentaires en attentes
- de supprimer un utilisateur
- ....
-->
<div class="container">
    <div class="form-group align-items-center">
        <form action="index.php?controller=connection&task=find" method="POST" class="form-control">
            <h4>Vous voulez commenter les articles du blog ? Inscrivez-vous !</h4><br>

            <input type="text" name="pseudo" placeholder="Saisissez un pseudo !" class="form-control">
            <input type="text" name="password" placeholder="Saississez un MOT DE PASSE !" class="form-control">

            <button class="btn btn-success" >Se connecter</button>
        </form>
    </div>
</div>