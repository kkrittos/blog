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
        <div class="row title-table">
          <h2>Оновлення запису</h2>
        </div>
        <div class="row add-post">
          <div class="mb-12 col-12 col-md-12 err">
            <?php include "../../app/helps/errorInfo.php"; ?>
          </div>
          <form action="edit.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= isset($id) ? htmlspecialchars($id) : ''; ?>">
  <input value="<?= isset($post['title']) ? htmlspecialchars($post['title']) : ''; ?>" name="title" type="text" class="form-control" placeholder="Заголовок" aria-label="Заголовок статті">
  <textarea name="content" id="editor" class="form-control" rows="6"><?= isset($post['content']) ? htmlspecialchars($post['content']) : ''; ?></textarea>
  <div class="input-group mb-2">
    <input name="img" type="file" class="form-control" id="inputGroupFile02">
    <label class="input-group-text" for="inputGroupFile02">Завантажити</label>
  </div>
  <select name="topic" class="form-select mb-2">
    <?php foreach ($topics as $key => $topic): ?>
      <option value="<?= $topic['id']; ?>" <?= isset($post['id_topic']) && $post['id_topic'] == $topic['id'] ? 'selected' : ''; ?>><?= htmlspecialchars($topic['name']); ?></option>
    <?php endforeach; ?>
  </select>
  <div class="form-check">
    <input class="form-check-input" name="publish" type="checkbox" id="flexCheckChecked" <?= isset($publish) && $publish ? 'checked' : ''; ?>>
    <label class="form-check-label" for="flexCheckChecked"> Опублікувати</label>
  </div>
  <button name="edit_post" class="btn btn-primary" type="submit">Зберегти</button>
</form>
        </div>
      </div>
    </div>
  </div>

  <?php include("../../app/include/footer.php"); ?>

    <script src="https://kit.fontawesome.com/297b82d5ec.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="../../assets/js/scripts.js"></script>
  </body>
</html>