<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $message = $_POST['message'] ?? '';
    
    if ($name && $message) {
        $messages = file_exists('messages.json') ? json_decode(file_get_contents('messages.json'), true) : [];
        
        $newMessage = [
            'name' => $name,
            'message' => $message,
            'time' => date('Y-m-d H:i:s')
        ];
        
        array_push($messages, $newMessage);
        
        // 最新の100件のみ保持
        if (count($messages) > 100) {
            $messages = array_slice($messages, -100);
        }
        
        file_put_contents('messages.json', json_encode($messages, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}

header('Location: index.php');
exit;