<?php 

session_start();
require('connect.php');

function tt($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
} 

// Check request
function dbCheckError($query) {
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

// Data of 1 table
function selectAll($table, $params = []) {
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
       $i = 0;
       foreach($params as $key => $value) {
        if (!is_numeric($value)) {
            $value = "'".$value."'";
        }
        if ($i === 0) {
            $sql = $sql . " WHERE $key=$value";
        } else {
            $sql = $sql . " AND $key=$value";
        }
        $i++;
       }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function selectOne($table, $params = []) {
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
       $i = 0;
       foreach($params as $key => $value) {
        if (!is_numeric($value)) {
            $value = "'".$value."'";
        }
        if ($i === 0) {
            $sql = $sql . " WHERE $key=$value";
        } else {
            $sql = $sql . " AND $key=$value";
        }
        $i++;
       }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

function insert($table, $params) {
    global $pdo;
    
    // Створюємо стрічки з назвами колонок та масками для підстановки значень
    $columns = implode(", ", array_keys($params));
    $placeholders = ":" . implode(", :", array_keys($params));
    // Створюємо SQL запит
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    // Підготовка запиту
    $query = $pdo->prepare($sql);
    // Прив'язуємо кожне значення до відповідного параметра
    foreach ($params as $key => $value) {
        $query->bindValue(":$key", $value);
    }

    // Виконуємо запит
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
}

function update($table, $id, $params) {
    global $pdo;
    $str = '';
    foreach ($params as $key => $value) {
        $str .= "$key = :$key, ";
    }
    $str = rtrim($str, ', ');

    // Оновлюємо SQL запит з плейсхолдером для id
    $sql = "UPDATE $table SET $str WHERE id = :id";
    $query = $pdo->prepare($sql);

    // Додаємо id до параметрів
    $params['id'] = $id;

    // Виконуємо запит з параметрами
    try {
        $query->execute($params);
        dbCheckError($query);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function delete($table, $id) {
    global $pdo;
    $sql = "DELETE FROM $table WHERE id =". $id;
    $query = $pdo->prepare($sql);
    // Додаємо id до параметрів
    $params['id'] = $id;
    // Виконуємо запит з параметрами
    $query->execute();
    dbCheckError($query);
}

function selectAllFromPostsWithUser($table1, $table2) {
    global $pdo;
    $sql = "SELECT t1.id, t1.title, t1.img, t1.content, t1.status, t1.id_topic,
    t1.create_date,
    t2.username FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function selectAllFromPosts($table1, $table2) {
    global $pdo;
    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status=1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function search($text, $table1, $table2) {
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status=1 AND p.title LIKE '%$text%' OR p.content LIKE '%t$text%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function selectTopTopic($table1) {
    global $pdo;
    $sql = "SELECT * FROM $table1 WHERE id_topic = 18";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function selectForSingle($table1, $table2, $id) {
    global $pdo;
    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id=$id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}