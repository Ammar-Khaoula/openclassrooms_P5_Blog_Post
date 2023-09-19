  <?php if(isset($_GET['success'])): ?>
      <div class="alert alert-success">Nous avons bien pris en compte votre demande d'inscription</div>
  <?php endif ?>
  <?php if(isset($_GET['error'])): ?>
      <div class="alert alert-danger">votre compte est pas encore validé</div>
  <?php endif ?>
  <?php if(isset($_GET['message'])): ?>
      <div class="alert alert-danger">Verifier votre email ou votre mot de passe</div>
  <?php endif ?>

<div id="login">
    <form class="row row-cols-lg-auto g-2 align-items-center" action="/openclassrooms_P5_Blog_Post/login" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">  
    <div class="col-md-10">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="col-md-10">
        <label for="mp" class="form-label">mot de passe</label>
        <input type="password" class="form-control" id="mp" name="mp" required>
      </div>
      <div class="col-8">
        <button type="submit" class="btn btn-primary">se connecter</button>
      </div>
    </form>
</div>
