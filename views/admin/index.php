<h1>Administrations des articles</h1>
<?php if(isset($_GET['success'])): ?>
<div class="alert alert-success">vous êtes connecté</div>
<?php endif ?>
<a href="/openclassrooms_P5_Blog_Post/admin/createPost" class="btn btn-success my-3 mx-5">créer un nouvel article</a>

<div class="d-flex justify-content-between">
<table class="table">
  <thead>  
    <tr>
      <th scope="col">#</th>
      <th scope="col">author</th>
      <th scope="col">titre</th>
      <th scope="col">publie à</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  
        <?php foreach($params['posts'] as $post) : ?>
            <tr>
                <th scope="row"><?= $post->getIdPost() ?></th>
                <td><?= $post->getLastName() . ' '.$post->getFirstName() ?></td>
                <td><?= $post->getTitle() ?></td>
                <td><?= $post->getDateLastUpdate()?></td>
                <td>
                    <a href="/openclassrooms_P5_Blog_Post/admin/editPost?idPost=<?= $post->getIdPost() ?>" class="btn btn-warning">Modifier</a>
                    <form action="/openclassrooms_P5_Blog_Post/admin/deletePost?idPost=<?= $post->getIdPost() ?>" method="POST" class="d-inline">
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>
