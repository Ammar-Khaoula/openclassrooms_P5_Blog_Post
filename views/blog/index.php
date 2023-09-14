<?php if(isset($_GET['error'])): ?>
    <div class="alert alert-danger">vous n'êtes pas connecté</div>
  <?php endif ?>
  <?php if(isset($_GET['message'])): ?>
    <div class="alert alert-danger">vous ne pouvez pas modifier cette commentaire</div>
  <?php endif ?>

<?php foreach($params['posts'] as $post) : ?>
<div class="card m-4 ">
    <div class="card-body" >
        <div class="d-flex p-2" style="justify-content: space-between;">
            <h2 class="card-title titlePost"><?= $post->getTitle() ?></h2>
            <small class="date">Publié le <?= $post->getDateLastUpdate() ?></small> 
        </div> 
        <input type="hidden" name="idPost" value="<?= $post->getIdPost(); ?>">
        <h5 class="text-secondary chapo"><?= $post->getChapo() ?></h5>
          <?= $post->getButton()?>
    </div>   
</div>
<?php endforeach ?>
