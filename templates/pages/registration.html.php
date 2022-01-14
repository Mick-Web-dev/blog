<!--
ici on permet à un utilisateur de créer un compte, en vérifiant les informations saisies, et en validant son
adresse mail pour:
- confirmer qu'il est a l'origine de l'action
- récupérer ses identifiants de connexion

//TODO ->IL FAUT PRÉVOIR QUE L'UTILISATEUR EXISTE EN BDD
//si l'utilisateur existe alors un message l'informe que ses identifiants
//sont présent dans la bdd et qu'il doit se connecter ou récupérer ses infos s'il
//ne les a plus via un lien s'affichant après la soumission du formulaire
-->
<div class="container">
    <div class="form-group align-items-center">
        <form action="index.php?controller=registration&task=insert" method="POST" class="form-control">
            <h4>Vous voulez commenter les articles du blog ? Inscrivez-vous !</h4><br>

            <input type="text" name="pseudo" placeholder="Choisissez un pseudo !" class="form-control">
            <input type="text" name="password" placeholder="Choisissez un MOT DE PASSE !" class="form-control">
            <input type="text" name="auteur" placeholder="Saisissez votre mail !" class="form-control">

            <button class="btn btn-success" onclick="return window.confirm(`Vos informations sont-elles correctes ?`)">S'enregistrer</button>
        </form>
    </div>
</div>