<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog php</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'style.css'?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'mobile.css'?>" media="all and (max-width:768px)">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'tablette.css'?>"  media="all and (min-width:769px) and (max-width:991px)">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!--Google FontAwesome-->
        <script src="https://kit.fontawesome.com/613a25ab47.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed&family=Comfortaa&family=Imperial+Script&family=Roboto:ital,wght@0,300;0,400;0,700;1,900&family=Work+Sans:ital,wght@0,100;0,200;0,600;0,800;1,300;1,400;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m-2">
            <li class="nav-item">
                <a class="nav-link" href="/openclassrooms_P5_Blog_Post">Articles</a>
            </li>
            <?php if(isset($_SESSION['users']) && !empty($_SESSION['users']['idUser'])): ?> 
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/openclassrooms_P5_Blog_Post/profil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/openclassrooms_P5_Blog_Post/logout">Déconnexion</a>
                </li>
            <?php else: ?> 
                    <li class="nav-item">
                        <a class="nav-link" href="/openclassrooms_P5_Blog_Post/signup">S'inscrire\Se connecter</a>
                    </li>
            <?php endif;?>
        </ul>
        </div>
    </div>
    </nav>
    <div class="container">
    <?= $content?>
    </div>
    <footer class="col-12" id="footer">
        <span>&copy; <?php echo date("Y");?> <a href="mailto:khaoulabha1991@gmail.com">Ammar_Khaoula</a></span>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
