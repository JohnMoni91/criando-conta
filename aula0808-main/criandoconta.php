<?php
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirmar-senha'];

if ($senha !== $confirmar_senha) {
    header('Location: criandoconta.php?erro=senha');
    exit();
}

$file = 'usuarios.txt';


if (!file_exists($file)) {
    file_put_contents($file, '');
}

file_put_contents($file, $email . ':' . password_hash($senha, PASSWORD_DEFAULT) . PHP_EOL, FILE_APPEND);

header('Location: index.php');
exit();
?>
