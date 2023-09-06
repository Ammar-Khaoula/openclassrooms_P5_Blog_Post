
<h1 class="text-primary mt-3">créer votre commentaire</h1>
<form action="/openclassrooms_P5_Blog_Post/post/createComment?idPost=<?=$params['post']->getIdPost();?>" method="POST" class="m-2">  
    <div class="form-group mt-4">
                <!--author-->       
    </div>
    <div class="form-group mt-4">
        <label for="content">contenu de commentaire</label>
        <textarea name="contentComment" id="content" rows="8" class="form-control"></textarea>
    </div> 
        <button type="submit" class="btn btn-info mt-3"> enregistrer mon commentaire</button>
</form>