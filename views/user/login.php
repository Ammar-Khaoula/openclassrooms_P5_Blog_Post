<h1>se connecter</h1>

  <?php if(isset($_GET['success'])): ?>
      <div class="alert alert-success">Nous avons bien pris en compte votre demande d'inscription</div>
  <?php endif ?>
  <?php if(isset($_GET['error'])): ?>
      <div class="alert alert-danger">votre compte est pas encore validé</div>
  <?php endif ?>

<form action="/openclassrooms_P5_Blog_Post/login" method="POST">
  <div class="col-md-8">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="col-md-8">
    <label for="mp" class="form-label">mot de passe</label>
    <input type="password" class="form-control" id="mp" name="mp" required>
  </div>
  <div class="col-8">
    <button type="submit" class="btn btn-primary">se connecter</button>
  </div>
</form>