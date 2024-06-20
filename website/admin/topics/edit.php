<?php 
include "../../path.php"; 
include "../../app/controllers/topics.php";
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
          <a href="<?php echo BASE_URL . "admin/topics/create.php"; ?>" class="col-3 btn btn-success">Створити</a>
          <span class="col-1"></span>
          <a href="<?php echo BASE_URL . "admin/topics/index.php"; ?>" class="col-3 btn btn-warning">Управління</a>
        </div>
        <div class="row title-table">
          <h2>Оновлення категорії</h2>
          </div>
          <div class="row add-post">
          <div class="mb-12 col-12 col-md-12 err">
            <p>
              <?=$errMessage?>
            </p>
          </div>
            <form action="create.php" method="post">
            <input name="id" value="<?=$id;?>" type="hidden">
                <div class="col">
                    <input name="name" value="<?=$name;?>" type="text" class="form-control" placeholder="Назва категорії" aria-label="Назва категорії">
                </div>
                <div class="col">
                    <label for="content" class="form-label">Опис категорії</label>
                    <textarea name="description" class="form-control" id="content" rows="3"><?=$description;?></textarea>
                </div>
                <div class="col">
                    <button name="topic-edit" class="btn btn-primary" type="submit">Оновити</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <?php include("../../app/include/footer.php"); ?>

    <script src="https://kit.fontawesome.com/297b82d5ec.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>