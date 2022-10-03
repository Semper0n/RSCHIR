<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/unix_style.css">
    <title>Unix Commands</title>
</head>
<body>
    <div>
        <?php
        function print_cmd($cmd) {
            $lines = array();
            exec($cmd, $lines);
            echo "<p>> $cmd </p>";
            echo "<pre>> " . implode("\n> ", $lines) . "</pre>";
        }
        $command = $_GET["cmd"];
        $command_list = array('ps', 'ls', 'whoami', 'id', 'echo');
        print_cmd($command);
        echo "<p>Перечень команд: 'ps', 'ls', 'whoami', 'id', 'echo'</p>";
        ?>
    </div>
</body>
</html>