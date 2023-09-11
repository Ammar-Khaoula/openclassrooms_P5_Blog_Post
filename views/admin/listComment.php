<h1 class="lists">liste des commentaires</h1>
<?php if(isset($_GET['success'])): ?>
      <div class="alert alert-success">ce commentaire est validé</div>
  <?php endif ?>

<div class="container">
    <table class="table">
      <thead>
        <tr>
          <th class="col-3 text-info size">author</th>
          <th class="col-3 text-info size">article</th>
          <th class="col-3 text-info size">Commentaire</th>
          <th class="col-3 text-info size">Etat</th>
        </tr>
      </thead>
      <tbody>
      
            <?php foreach($params['comment'] as $comment) : ?>
              <form action="/openclassrooms_P5_Blog_Post/admin/listComment?idComment=<?= $comment->getIdComment() ?>" method="POST"class="btn btn-info">
                <tr>
                    <td class="size"><?= $comment->getLastName() . ' '.$comment->getFirstName() ?></td>
                    <td class="size"><?= $comment->getTitle() ?></td>
                    <td class="size"><?= $comment->getContentComment() ?></td>
                    <td>
                    <?php if($comment->getValidateComment() == 1): ?> 
                        <button type="submit" class="btn btn-success"><i class="fa fa-check-square" aria-hidden="true"></i></button>
                    <?php else: ?>
                        <button type="submit" class=" btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i></button>
                        <?php endif;?>
                    </td>
                </tr>
              </form>
            <?php endforeach ?>
            
        </tbody>
    </table>
</div>
