<div class="container">
    <div class="form-group align-items-center">
        <form action="index.php?controller=contact&task=insert" method="POST" class="form-control">
            <h4>Formulaire de Contact</h4><br>
            <input type="text" name="nom" id="nom" placeholder="Votre nom !" class="form-control">
            <input type="text" name="prenom" id="prenom" placeholder="Votre prenom !" class="form-control">
            <input type="text" name="mail" id="mail" placeholder="Votre mail !" class="form-control">
            <br>
            <textarea name="message" id="message" cols="30" rows="3" placeholder="Votre message ..." class="form-control"></textarea><br>
            <button class="btn btn-success" onclick="return window.confirm(`Souhaitez-vous confirmer votre message ?`)">Envoyer</button>
        </form>
    </div>
</div>