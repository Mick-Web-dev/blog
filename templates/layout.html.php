<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mickael-Hesliere-Blog - <?= $pageTitle ?></title>
</head>

<body>
    <header class="border-bottom border-warning border-4">
        <div class="row accordion-header bg-secondary">
            <div class="col p-sm-4">
                <img src="././images/avartar-webdev47.png" alt="avatar" width="10%" class="m-sm-auto">
               <div class="row m-lg-auto">
                   <h1><a href="index.php" class="text-dark text-decoration-none">Mickael Hesliere</a></h1>
                   <h4 class="font-monospace text-light">Développeur Web</h4>
                   <p><i>"Mes objectifs : être utile et se dépasser chaque jour pour vos projets !"</i></p>
               </div>
            </div>
            <div class="d-flex flex-row bd-highlight justify-content-end">
               <a href="index.php?controller=projects&task=index" class="text-warning text-decoration-none m-3"><b>Projets</b></a>
                <a href="index.php?controller=cv&task=index" class="text-warning text-decoration-none m-3"><b>CV</b></a>
                <a href="index.php?controller=contact&task=create"" class="text-warning text-decoration-none m-3"><b>contact</b></a>
               <a href="index.php?controller=mentions&task=index" class="text-warning text-decoration-none m-3"><b>Mentions légales</b></a>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="card card-text mb-5 mt-5" >
            <?= $pageContent ?>
        </div>
    </div>

    <footer class="footer position-relative mb-0 border-top border-warning border-4">
        <div class="row bg-dark text-warning ">
            <div class="row col-8 d-flex align-items-end text-center">
                <p>
                    <a href="#" class="text-info text-decoration-none">Linkedin </a
                    <a href="#" class="text-light text-decoration-none"> | Github | </a>
                    <a href="#" class="text-success text-decoration-none"> Site.Google</a>
                </p>
                <p class="text-warning">Mickael Hesliere &copy; 2022 webdev47.fr All Right Reserved</p>
            </div>
            <div class="col col-4 bg-secondary">
                <div class="row">
                    <h4 class="text-center">Participer et échanger :</h4>
                </div>
                <div class="row text-center">
                    <p><a href="index.php?controller=register&task=create" class="text-dark"><b>S'inscrire</b></a></p>
                    <p><a href="index.php?controller=connexion&task=insert" class="text-dark"><b>Se connecter</b></a></p>
                </div>
            </div>
        </div>

    </footer>
</body>

</html>