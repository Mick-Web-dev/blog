<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?= $t ?></title>
</head>
<body>
<header>
   <div class="container bg-primary">
       <div class="row">
           <h1>Mon blog</h1>
           <p>Bienvenue sur mon blog</p>
       </div>
   </div>
</header>
<div class="container">
    <div class="col col-6 mt-3">
        <?= $content ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </div>
</div>
<footer>
    <div class="container bg-success mb-0">
        <div class="col col-5">
            <h3><u>S'identifier :</u></h3>
            <p><a href="#">Connexion</a></p>
            <p><a href="#">Créer un compte</a></p>
        </div>
        <div class="col col-6">
            <p>copyright@webdev47 tous droits réservés  -  2021</p>
        </div>
    </div>
</footer>
</body>
</html>