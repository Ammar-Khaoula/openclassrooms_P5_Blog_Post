<h1>modifier</h1>
<form action="/openclassrooms_P5_Blog_Post/post/updateComment?idComment=<?= $params['comments']->getIdComment() ?>" method="POST" class="m-2">
    <div class="form-group mt-4">
        <label for="content">commentaire</label>
        <textarea name="contentComment" id="content" rows="8" class="form-control"><?= $params['comments']->getContentComment()?></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3"> enregistrer les modification</button>
</form>
