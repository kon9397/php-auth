<?php

require_once __DIR__ . '\connect.php';
$data = json_decode(file_get_contents('php://input'), true);

if(isset($data['id']) && isset($data['token'])) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
    $stmt->execute(['id' => $data['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(($user['token'] !== $data['token']) or ($user['id'] !== $data['id'])) {
        $errors = [
            'message' => 'error authentication',
            'permission' => false
        ];

        echo json_encode($errors, JSON_UNESCAPED_UNICODE);
    } else {
        $answer = [
            'message' => 'auth complete',
            'permission' => true
        ];

        echo json_encode($answer, JSON_UNESCAPED_UNICODE);
    }
}