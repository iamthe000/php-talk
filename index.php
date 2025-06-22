<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PHP Chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="chat-container">
        <h1>PHP Chat</h1>
        <div id="chat-messages">
            <?php
            $messages = file_exists('messages.json') ? json_decode(file_get_contents('messages.json'), true) : [];
            foreach ($messages as $msg) {
                echo "<div class='message'>";
                echo "<span class='name'>" . htmlspecialchars($msg['name']) . ":</span> ";
                echo "<span class='text'>" . htmlspecialchars($msg['message']) . "</span>";
                echo "<span class='time'>" . $msg['time'] . "</span>";
                echo "</div>";
            }
            ?>
        </div>
        <form action="post.php" method="POST">
            <input type="text" name="name" placeholder="名前" required>
            <input type="text" name="message" placeholder="メッセージ" required>
            <button type="submit">送信</button>
        </form>
    </div>
</body>
</html>