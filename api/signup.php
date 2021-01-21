<?php

require_once __DIR__ . '\connect.php';
$data = json_decode(file_get_contents('php://input'), true);
$err = [];
if(!preg_match("/^[a-zA-Z0-9]+$/", $data['login'])) {
    $err[] = "Логин может состоять только из букв английского алфавита и цифр";
}

if(strlen($data['login']) < 3 or strlen($data['login']) > 30)
{
    $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
}

$stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login');
$stmt->execute(['login' => $data['login']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if($user) {
    $err[] = "Пользователь с таким логином уже существует";
}

if(count($err) === 0) {
    $login = $data['login'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (login, password) VALUES (?,?)");
    $stmt->execute([$login, $password]);

    $answer = [
        'message' => 'Регистрация прошла успешно',
        'type' => true
    ];

    echo json_encode($answer, JSON_UNESCAPED_UNICODE);
} else {
    $answer = [
        'errors' => $err,
        'type' => false
    ];
    echo json_encode($answer, JSON_UNESCAPED_UNICODE);
}
