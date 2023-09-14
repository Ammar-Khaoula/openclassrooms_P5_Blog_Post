<h1>modifier</h1>
<form action="/openclassrooms_P5_Blog_Post/admin/editProfil?idUser=<?= $params['admin']->getiduser() ?>" method="POST" class="m-2" enctype="multipart/form-data">
    <div class="form-group mt-4">
        <label for="title">nom</label>
        <input type="text" class="form-control" name="lastName" id="title" value="<?= $params['admin']->getlastName()?>">        
    </div>
    <div class="form-group mt-4">
        <label for="title">prenom</label>
        <input type="text" class="form-control" name="firstName" id="title" value="<?= $params['admin']->getFirstName()?>">        
    </div>
    <div class="form-group mt-4">
        <label for="title">catchphrase</label>
        <input type="text" class="form-control" name="catchphrase" id="title" value="<?= $params['admin']->getCatchphrase()?>">        
    </div>
    <div class="form-group">
        <label for="title">ajoute un photo</label>
        <input type="file"  name="photo" class="form-control" placeholder="ajoute un image..."  value="<?= $params['admin']->getPhoto()?>">
    </div>
    <button type="submit" class="btn btn-primary mt-3"> enregistrer les modification</button>
</form>
