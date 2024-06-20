<?php
include SITE_ROOT . "/app/db/db.php";

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header('Location: ' . BASE_URL . 'log.php');
    exit();
}

$errMessage = [];
$id = '';
$title = '';
$content = '';
$topic = '';
$publish = 0;
$topics = selectAll('topics');
$postsAdm = selectAllFromPostsWithUser('posts', 'users');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])) {
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $content = isset($_POST['content']) ? trim($_POST['content']) : '';
    $topic = isset($_POST['topic']) ? trim($_POST['topic']) : '';
    $publish = isset($_POST['publish']) ? 1 : 0;

    if (!empty($_FILES['img']['name'])) {
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "/assets/images/posts/" . $imgName;

        if (strpos($fileType, 'image') === false) {
            array_push($errMessage, "Файл не є зображенням!");
        }

        $result = move_uploaded_file($fileTmpName, $destination);

        if ($result) {
            $_POST['img'] = $imgName;
        } else {
            array_push($errMessage, "Помилка завантаження зображення!");
        }
    } else {
        array_push($errMessage, "Помилка отримання зображення!");
    }

    if ($title === '' || $content === '' || $topic === '') {
        array_push($errMessage, "Не всі поля заповнені!");
    } elseif (mb_strlen($title, 'UTF8') < 10) {
        array_push($errMessage, "Назва поста має бути більше 10 символів!");
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];
        $postId = insert('posts', $post);
        header('Location: ' . BASE_URL . 'admin/posts/index.php');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
    if ($post) {
        $id = $post['id'];
        $title = $post['title'];
        $content = $post['content'];
        $topic = $post['id_topic'];
        $publish = $post['status'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])) {
    $id = isset($_POST['id']) ? trim($_POST['id']) : '';
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $content = isset($_POST['content']) ? trim($_POST['content']) : '';
    $topic = isset($_POST['topic']) ? trim($_POST['topic']) : '';
    $publish = isset($_POST['publish']) ? 1 : 0;

    if ($title === '' || $content === '' || $topic === '') {
        array_push($errMessage, "Не всі поля заповнені");
    } elseif (mb_strlen($title, 'UTF8') < 10) {
        array_push($errMessage, "Назва статті має бути більше 10 символів");
    } else {
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => '',
            'status' => $publish,
            'id_topic' => $topic
        ];

        if (!empty($_FILES['img']['name'])) {
            $imgName = time() . "_" . $_FILES['img']['name'];
            $fileTmpName = $_FILES['img']['tmp_name'];
            $fileType = $_FILES['img']['type'];
            $destination = ROOT_PATH . "/assets/images/posts/" . $imgName;

            if (strpos($fileType, 'image') === false) {
                array_push($errMessage, "Файл не є зображенням!");
            } else {
                $result = move_uploaded_file($fileTmpName, $destination);

                if ($result) {
                    $post['img'] = $imgName;
                } else {
                    array_push($errMessage, "Помилка завантаження зображення!");
                }
            }
        }

        if (empty($errMessage)) {
            update('posts', $id, $post);
            header('Location: ' . BASE_URL . 'admin/posts/index.php');
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];
    $postId = update('posts', $id, ['status' => $publish]);
    header('Location: ' . BASE_URL . 'admin/posts/index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('posts', $id);
    header('Location: ' . BASE_URL . 'admin/posts/index.php');
    exit();
}