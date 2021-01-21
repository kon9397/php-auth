<?php

require_once __DIR__ . '\connect.php';

$data = json_decode(file_get_contents('php://input'), true);

function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

$stmt = $pdo->prepare('SELECT id, password FROM users WHERE login = :login LIMIT 1');
$stmt->execute(['login' => $data['login']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if($user) {
    if(password_verify($data['password'], $user['password'])) {
        $token = md5(generateCode(10));

        $stmt = $pdo->prepare("UPDATE users SET token = ? WHERE id = ?");
        $requestData = [
            'id' => $user['id'],
            'token' => $token
        ];

        $stmt->execute([$token, $user['id']]);
        $answer = json_encode($requestData, JSON_UNESCAPED_UNICODE);
        echo $answer;
    } else {
        $message = [
            'message' => 'Пароль неправильный'
        ];
        echo json_encode($message, JSON_UNESCAPED_UNICODE);
    }
} else {
    $message = [
        'message' => 'Такого пользователя не существует'
    ];
    echo json_encode($message, JSON_UNESCAPED_UNICODE);
}