<h1 class="lists">Administrations des articles</h1>
<?php if(isset($_GET['success'])): ?>
<div class="alert alert-success">vous êtes connecté</div>
<?php endif ?>
<a href="/openclassrooms_P5_Blog_Post/admin/createPost" class="btn btn-success my-3 mx-5">créer un nouvel article</a>

<div class="d-flex justify-content-between">
<table class="table">
  <thead>  
    <tr>
      <th class="col-3 text-info">author</th>
      <th class="col-3 text-info">titre</th>
      <th class="col-3 text-info">publie à</th>
      <th class="col-3 text-info">Actions</th>
    </tr>
  </thead>
  <tbody>
  
        <?php foreach($params['posts'] as $post) : ?>
            <tr>
                <td><?= $post->getLastName() . ' '.$post->getFirstName() ?></td>
                <td><?= $post->getTitle() ?></td>
                <td><?= $post->getDateLastUpdate()?></td>
                <td>
                    <a href="/openclassrooms_P5_Blog_Post/admin/editPost?idPost=<?= $post->getIdPost() ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <form action="/openclassrooms_P5_Blog_Post/admin/deletePost?idPost=<?= $post->getIdPost() ?>" method="POST" class="d-inline">
                        <button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>
