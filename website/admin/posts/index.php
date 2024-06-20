<?php 
include "../../path.php"; 
include "../../app/controllers/posts.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ТДВ "ОДЕБП"</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/admin.css">
  </head>
  <body>

  <?php include("../../app/include/header-admin.php"); ?>

  <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
      <div class="posts col-9">
        <div class="button row">
          <a href="<?php echo BASE_URL . "admin/posts/create.php"; ?>" class="col-3 btn btn-success">Створити</a>
          <span class="col-1"></span>
          <a href="<?php echo BASE_URL . "admin/posts/index.php"; ?>" class="col-3 btn btn-warning">Управління</a>
        </div>
        <div class="row title-table">
          <h2>Управління записами</h2>
          <div class="id col-1">ID</div>
          <div class="title col-3">Назва</div>
          <div class="author col-2">Автор</div>
          <div class="edit col-6">Управління</div>
          </div>
          <?php foreach ($postsAdm as $key => $post): ?>
          <div class="row post">
          <div class="id col-1"><?=$key +1; ?></div>
          <div class="title col-3"><?=$post['title']; ?></div>
          <div class="author col-2"><?=$post['username']; ?></div>
          <div class="edit col-2"><a href="edit.php?id=<?=$post['id'];?>">Редагувати</a></div>
          <div class="delete col-2"><a href="edit.php?delete_id=<?=$post['id'];?>">Видалити</a></div>
            <?php if ($post['status']): ?>
          <div class="status col-2"><a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">В чернетку</a></div>
            <?php else: ?>
              <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">Опублікувати</a></div>
            <?php endif;?>
            </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <?php include("../../app/include/footer.php"); ?>

    <script src="https://kit.fontawesome.com/297b82d5ec.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>