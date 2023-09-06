<h1>créer un nouvel article</h1>

<form action="/openclassrooms_P5_Blog_Post/admin/addPost" method="POST" class="m-2">
    <div class="form-group mt-4">
        <label for="title">titre de l'article</label>
        <input type="text" class="form-control" name="title" id="title" value="">        
    </div>
    <div class="form-group mt-4">
        <label for="title">chapo</label>
        <input type="text" class="form-control" name="chapo" id="title" value="">        
    </div>
    <div class="form-group mt-4">
        <label for="content">contenu de l'article</label>
        <textarea name="content" id="content" rows="8" class="form-control"></textarea>
    <button type="submit" class="btn btn-primary mt-3"> enregistrer mon article</button>
</form>
