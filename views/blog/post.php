
<div class="card mt-5 ">
    <div class="card-body ">  
        <h2 class="titlePost"><?= $params['post']->getTitle() ?></h2>
        <h5><?= $params['post']->getChapo() ?></h5>
        <p><?= $params['post']->getContent() ?></p> 
        <div class="d-flex p-2" style="justify-content: space-between;">
            <h6 class="text-secondary"><?= $params['post']->getLastName() . ' '.$params['post']->getFirstName() ?></h6> 
            <small class="text-secondary"><?= $params['post']->getDateLastUpdate() ?></small> 
        </div> 
        <a href="/openclassrooms_P5_Blog_Post/" class="btn btn-primary">voir tous les articles</a>       
    </div>    
    <a href="/openclassrooms_P5_Blog_Post/post/createComment?idPost=<?= $params['post']->getIdPost() ?>" class="col-md-3 btn btn-success my-3">ajouter un commentaire</a>
    <?php foreach($params['comment'] as $comment) : ?>
        <div class="card-body" style="border : .3px solid gray;">
            <div class="d-flex p-2" style="justify-content: space-between;">
            <h4><?=$comment->getpostComment()?></h4>
                <h2><?= $comment->getLastName() . ' '.$comment->getFirstName() ?></h2> 
                <small><p><?= $comment->getDateLastUpdateComment()?></p></small>
            </div> 
                <p><?= $comment->getContentComment() ?></p>   
                <a href="/openclassrooms_P5_Blog_Post/post/editComment?idComment=<?= $comment->getIdComment() ?>" class="btn btn-warning">Modifier</a>
                <form action="/openclassrooms_P5_Blog_Post/post/delete?idComment=<?= $comment->getIdComment() ?>" method="POST" class="d-inline">
                    <button class="btn btn-danger">Supprimer</button>
                </form>  
        </div> 
    <?php endforeach ?>  
</div>