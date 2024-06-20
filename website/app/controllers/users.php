<?php
include SITE_ROOT . "/app/db/db.php";

$errMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passwordF = trim($_POST['password']);
    $passwordS = trim($_POST['confPassword']);

    if ($login === '' || $email === '' || $passwordF === '') {
        $errMessage = 'Не всі поля заповнені!';
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        $errMessage = 'Логін має бути більше 2 символів!';
    } elseif ($passwordF !== $passwordS) {
        $errMessage = 'Паролі мають співпадати!'; 
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && $existence['email'] === $email) {
            $errMessage = 'Користувач з таким email вже існує!';
        } else {
            $password = password_hash($passwordF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $password
            ];
            $id = insert('users', $post); 
            $user = selectOne('users', ['id' => $id]);

            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];
            if ($_SESSION['admin']) {
                header('Location: ' . BASE_URL . "admin/posts/index.php");
            } else {
                header('Location: ' . BASE_URL);
            }
            exit();
        }
    }
} else {
    $login = '';
    $email = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email === '' || $password === '') {
        $errMessage = 'Не всі поля заповнені';
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && password_verify($password, $existence['password'])) {
            $_SESSION['id'] = $existence['id'];
            $_SESSION['login'] = $existence['username'];
            $_SESSION['admin'] = $existence['admin'];
            if ($_SESSION['admin']) {
                header('Location: ' . BASE_URL . "admin/posts/index.php");
            } else {
                header('Location: ' . BASE_URL);
            }
            exit();
        } else {
            $errMessage = 'Пошта або пароль введені неправильно!';
        }
    }
} else {
    $email = '';
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])) {
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passwordF = trim($_POST['password']);
    $passwordS = trim($_POST['confPassword']);

    if ($login === '' || $email === '' || $passwordF === '') {
        $errMessage = 'Не всі поля заповнені!';
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        $errMessage = 'Логін має бути більше 2 символів!';
    } elseif ($passwordF !== $passwordS) {
        $errMessage = 'Паролі мають співпадати!'; 
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && $existence['email'] === $email) {
            $errMessage = 'Користувач з таким email вже існує!';
        } else {
            $password = password_hash($passwordF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $password
            ];
            $id = insert('users', $post); 
            $user = selectOne('users', ['id' => $id]);

            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];
            if ($_SESSION['admin']) {
                header('Location: ' . BASE_URL . "admin/posts/index.php");
            } else {
                header('Location: ' . BASE_URL);
            }
            exit();
        }
    }
} else {
    $login = '';
    $email = '';
}
