<div id="register">
    <h3><span>B</span>ienvenue sur mon site, pour en voir plus, inscrivez-vous, Sinon,</h3>
    <a href="/openclassrooms_P5_Blog_Post/login" class="col-6 connect">connectez-vous</a>

      <?php if(isset($_GET['error'])): ?>
        <div class="alert alert-danger">cette adresse email est déjà prise</div>
      <?php endif ?>
    <form class="row row-cols-lg-auto g-1 align-items-center" action="/openclassrooms_P5_Blog_Post/signup" method="POST">
    <div class="col-md-10">
        <label for="inputfirestName" class="form-label">Prenom</label>
        <input type="text" class="form-control" id="inputfirstName" name="firstName" required>
      </div>
      <div class="col-md-10">
        <label for="inputlastName" class="form-label">Nom</label>
        <input type="text" class="form-control" name="lastName" required>
      </div>  
    <div class="col-md-10">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4" name="email" required>
      </div>
      <div class="col-md-10">
        <label for="inputPassword4" class="form-label">mot de passe</label>
        <input type="password" class="form-control" id="inputPassword4" name="mp" required>
      </div>
      <div class="col-8">
        <button type="submit" class="btn btn-primary">inscription</button>
      </div>
    </form>
</div>
