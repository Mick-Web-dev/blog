<!--
ici on permet à un utilisateur de créer un compte, en vérifiant les informations saisies, et en validant son
adresse mail pour:
- confirmer qu'il est a l'origine de l'action
- récupérer ses identifiants de connexion

TODO ->IL FAUT PRÉVOIR QUE L'UTILISATEUR EXISTE EN BDD
si l'utilisateur existe alors un message l'informe que ses identifiants
sont présent dans la bdd et qu'il doit se connecter ou récupérer ses infos
-->
<div class="container-fluid">
    <div class="form-group  p-4">
        <form action="index.php?controller=user&task=create" method="POST" class="form-control">
            <h4>Vous voulez commenter les articles du blog ? Inscrivez-vous !</h4><br>
            <h6>Choisissez :</h6>
            <input type="text" name="pseudo" id="pseudo" placeholder="Un pseudo !" class="form-control m-2">
            <span class="invalid-feedback"></span>
            <input type="text" name="password" id="password" placeholder="Un mot de passe !" class="form-control m-2">
            <span class="invalid-feedback"></span>
            <input type="text" name="mail" id="mail" placeholder="Saisissez votre mail !" class="form-control m-2">
            <span class="invalid-feedback"></span>

            <button class="btn btn-success m-2" onclick="return window.confirm(`Vos informations sont-elles correctes ?`)">S'enregistrer</button>
        </form>
    </div>
</div>