<h1>modifier <?= $params['post']->getTitle() ?></h1>
<form action="/openclassrooms_P5_Blog_Post/admin/updatePost?idPost=<?= $params['post']->getIdPost() ?>" method="POST" class="m-2">
    <div class="form-group mt-4">
        <label for="title">titre de l'article</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->getTitle()?>">        
    </div>
    <div class="form-group mt-4">
        <label for="title">chapo</label>
        <input type="text" class="form-control" name="chapo" id="title" value="<?= $params['post']->getChapo()?>">        
    </div>
    <div class="form-group mt-4">
        <label for="auteur">auteur</label>
        <input type="text" class="form-control" name="auteur" id="title" value="<?= $params['post']->getAuteur()?>">        
    </div>
    <div class="form-group mt-4">
        <label for="content">contenu de l'article</label>
        <textarea name="content" id="content" rows="8" class="form-control"><?= $params['post']->getContent()?></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3"> enregistrer les modification</button>
</form>
