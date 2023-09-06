<h1>s'inscrire</h1>
<h3>Bienvenue sur mon site, pour en voir plus, inscrivez-vous, Sinon, <a href="/openclassrooms_P5_Blog_Post/login" class="text-bg-warning">connectez-vous</a></h3>

  <?php if(isset($_GET['error'])): ?>
    <div class="alert alert-danger">cette adresse email est déjà prise</div>
  <?php endif ?>

<form action="/openclassrooms_P5_Blog_Post/signup" method="POST">
<div class="col-md-8">
    <label for="inputfirestName" class="form-label">firstName</label>
    <input type="text" class="form-control" id="inputfirstName" name="firstName" required>
  </div>
  <div class="col-md-8">
    <label for="inputlastName" class="form-label">lastName</label>
    <input type="text" class="form-control" name="lastName" required>
  </div>  
<div class="col-md-8">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email" required>
  </div>
  <div class="col-md-8">
    <label for="inputPassword4" class="form-label">mot de passe</label>
    <input type="password" class="form-control" id="inputPassword4" name="mp" required>
  </div>
  <div class="col-8">
    <button type="submit" class="btn btn-primary">inscription</button>
  </div>
</form>
