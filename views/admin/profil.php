
<div id="profil">
    <div class="m-5" >
        <div>   
                <img class="rounded mx-auto d-block" id="imageProfil" src="../../../openclassrooms_P5_Blog_Post/public/<?=$params['admin']->getPhoto()?>" alt="logo" style="height:300px"> 
        </div>
        <div class="card text-center">
            <div class="card-header">
            <?= $params['admin']->getLastName() . ' ' . $params['admin']->getFirstName()?>
            </div>
            <div class="card-body">
            <p class="card-text"><?= $params['admin']->getCatchphrase()?></p>
            <a href="/openclassrooms_P5_Blog_Post/admin/editProfil?idUser=<?= $params['admin']->getIdUser() ?>" class="btn btn-warning">Modifier</a>
        </div>
    </div>
    <form action="/openclassrooms_P5_Blog_Post/profil" method="POST">
        <div class="row">
            <h2>Contactez-Nous</h2>
            <div class="col-md-5 p-3">
                <label for="firstname">Prenom</label>
                <input type="text" name="firstName" class="form-control" placeholder="prenom" aria-label="First name">
            </div>
            <div class="col-md-5 p-3">
                <label for="lasttname">Nom</label>
                <input type="text" name="lastName" class="form-control" placeholder="nom" aria-label="Last name">
            </div>
            <div class="col-md-10 p-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Votre Email">
            </div>
            <div class="form-floating col-md-10 p-3">
                <textarea class="form-control" name="message" style="height: 150px" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                <label for="message">Messages</label>
            </div>
            <button type="submit" class="col-md-4">Envoyer</button>
        </div>
    </form>
        <h2>Suivez-Moi </h2>
    <div class="m-5 profil">
        <div class="col-md-6" id="cv">
            <a href="../../../openclassrooms_P5_Blog_Post/public/images/cv_khaoula.pdf">C.V</a>
        </div>
        <div class="col-md-6">
            <a href="https://www.linkedin.com/in/khaoula-ammar/" >
                <i class="fa fa-linkedin-square" aria-hidden="true"></i>
            </a>
            <a href="https://twitter.com/AmmarKhaoula2">
                <i class="fa fa-twitter-square" aria-hidden="true"></i>
            </a>
            <a href="https://github.com/Ammar-Khaoula">
                <i class="fa fa-github-square" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
