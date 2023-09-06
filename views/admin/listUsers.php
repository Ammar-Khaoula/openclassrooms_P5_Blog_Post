<h1 class="lists">liste des utilisateurs</h1>
<?php if(isset($_GET['success'])): ?>
      <div class="alert alert-success">ce compte est validé</div>
  <?php endif ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-info">#</th>
      <th scope="col" class="text-info">nom et prenom</th>
      <th scope="col" class="text-info">etat</th>
    </tr>
  </thead>
  <tbody>
  
        <?php foreach($params['users'] as $user) : ?>
          <form action="/OpenClassrooms_P5_create_your_first_blog_in_php/admin/listUsers?idUser=<?= $user->getIdUser() ?>" method="POST">
            <tr>
                <th scope="row"><?= $user->getIdUser() ?></th>
                <td><?= $user->getLastName() . ' '.$user->getFirstName() ?></td>
                <td>
                <?php if($user->getValidate() == 1): ?> 
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
