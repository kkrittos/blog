<?php
include SITE_ROOT . "/app/db/db.php";

$errMessage = '';
$id = '';
$name = '';
$description = '';
$topics = selectAll('topics');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])) {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($name === '' || $description === '') {
        $errMessage = 'Не всі поля заповнені!';
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        $errMessage = 'Назва категорії має бути більше 2 символів!';
    } else {
        $existence = selectOne('topics', ['name' => $name]);
        if ($existence && $existence['name'] === $name) {
            $errMessage = 'Дана категорія вже існує!';
        } else {
            $topic = [
                'name' => $name,
                'description' => $description
            ];
            $id = insert('topics', $topic); 
            $topic = selectOne('topics', ['id' => $id]);
            header('location: ' . BASE_URL . 'admin/topics/index.php');
        }
    }
} else {
    $name = '';
    $description = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);
    if ($topic) {  // Додано перевірку
        $id = $topic['id'];
        $name = $topic['name'];
        $description = $topic['description'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])) {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0; // Перевірка та конвертація id до числа
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($name === '' || $description === '') {
        $errMessage = 'Не всі поля заповнені!';
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        $errMessage = 'Назва категорії має бути більше 2 символів!';
    } else {
            $topic = [
                'name' => $name,
                'description' => $description
            ];
            if ($id > 0) { // Перевірка коректності id
                update('topics', $id, $topic);
                header('location: ' . BASE_URL . 'admin/topics/index.php');
                exit();
            } else {
                $errMessage = 'Некоректний ідентифікатор категорії!';
            }
        }
    }

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete('topics', $id);
    header('location: ' . BASE_URL . 'admin/topics/index.php');
}
