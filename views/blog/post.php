<div class="card mt-5 ">
    <div class="card-body postById">  
        <h2 class="card-title titlePost"><?= $params['post']->getTitle() ?></h2>
        <h6 class="chapo"><?= $params['post']->getChapo() ?></h6>
        <p class="card-text content"><?= $params['post']->getContent() ?></p> 
        <div class="d-flex p-2" style="justify-content: space-between;">
            <h6><?= $params['post']->getAuteur()?></h6> 
            <h6 class="date"><?= $params['post']->getDateLastUpdate() ?></h6> 
        </div> 
        <a href="/openclassrooms_P5_Blog_Post/" class="btnRead">voir tous les articles</a>       
    </div>    
    <a href="/openclassrooms_P5_Blog_Post/post/createComment?idPost=<?= $params['post']->getIdPost() ?>" class="col-md-3 btn btn-success my-3">ajouter un commentaire</a>
    <?php foreach($params['comment'] as $comment) : ?>
        <div class="card-body commentPost">
            <div class="d-flex p-2" style="justify-content: space-between;">
                <h6 class="card-title"><?= $comment->getLastName() . ' '.$comment->getFirstName() ?></h6> 
                <small class="text-secondary  date"><p><?= $comment->getDateLastUpdateComment()?></p></small>
            </div> 
            <div class="d-flex p-2" style="justify-content: space-between;">
                <div>
                    <p class="card-text content"><?= $comment->getContentComment() ?></p>
                </div>
                <div>   

                    <form action="/openclassrooms_P5_Blog_Post/post/delete?idComment=<?= $comment->getIdComment() ?>" method="POST" class="d-inline">
                        <button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </form>  
                </div>
            </div>
        </div> 
    <?php endforeach ?>
</div>
