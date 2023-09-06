<h1 class="lists">liste des commentaires</h1>
<?php if(isset($_GET['success'])): ?>
      <div class="alert alert-success">ce commentaire est validé</div>
  <?php endif ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-info">#</th>
      <th scope="col" class="text-info">Nom et Prenom</th>
      <th scope="col" class="text-info">Nom d'article</th>
      <th scope="col" class="text-info">Commentaire</th>
      <th scope="col" class="text-info">Etat</th>
    </tr>
  </thead>
  <tbody>
  
        <?php foreach($params['comment'] as $comment) : ?>
          <form action="/openclassrooms_P5_Blog_Post/admin/listComment?idComment=<?= $comment->getIdComment() ?>" method="POST"class="btn btn-info">
            <tr>
            <th scope="row"><?= $comment->getIdComment()?></th>
                <td id="nom"><?= $comment->getLastName() . ' '.$comment->getFirstName() ?></td>
                <td><?= $comment->getTitle() ?></td>
                <td><?= $comment->getContentComment() ?></td>
                <td>
                <?php if($comment->getValidateComment() == 1): ?> 
                    <button type="submit" class=" btn btn-success mx-2">Valider</button>
                <?php else: ?>
                    <button type="submit" class=" btn btn-danger">Ne Pas Valider</button>
                    <?php endif;?>
                </td>
            </tr>
          </form>
        <?php endforeach ?>
        
    </tbody>
</table>