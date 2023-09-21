<?php if(isset($_GET['error'])): ?>
    <div class="alert alert-danger">vous n'êtes pas connecté</div>
  <?php endif ?>
  <?php if(isset($_GET['message'])): ?>
    <div class="alert alert-danger">vous ne pouvez pas modifier cette commentaire</div>
  <?php endif ?>

<?php foreach($params['posts'] as $post) : ?>
<div class="card m-4">
    <div class="card-body postsAll">
        <div class="d-flex p-2" style="justify-content: space-between;">
            <h2 class="card-title titlePost" style="width: 80%;"><?= $post->getTitle() ?></h2>
            <small class="date text-primary" style="width: 20%;"><?= $post->getDateLastUpdate() ?></small> 
        </div> 
        <input type="hidden" name="idPost" value="<?= $post->getIdPost(); ?>">
        <p class="text-secondary chapo"><?= $post->getChapo() ?></p>
          <?= $post->getButton()?>
    </div>   
</div>
<?php endforeach ?>
