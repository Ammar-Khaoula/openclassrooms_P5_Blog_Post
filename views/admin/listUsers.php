<h1 class="lists">liste des utilisateurs</h1>
<?php if(isset($_GET['success'])): ?>
      <div class="alert alert-success">ce compte est validé</div>
  <?php endif ?>
<div class="container">
    <table class="table">
      <thead>
        <tr>
          <th class="col-2 text-info">#</th>
          <th class="col-5 text-info">nom et prenom</th>
          <th class="col-5 text-info">etat</th>
        </tr>
      </thead>
      <tbody>
      
            <?php foreach($params['users'] as $user) : ?>
              <form action="/openclassrooms_P5_Blog_Post/admin/listUsers?idUser=<?= $user->getIdUser() ?>" method="POST">
              <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <tr>
                    <th scope="row"><?= $user->getIdUser() ?></th>
                    <td><?= $user->getLastName() . ' '.$user->getFirstName() ?></td>
                    <td>
                    <?php if($user->getValidate() == 1): ?> 
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
