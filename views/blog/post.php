
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
  
</div>
