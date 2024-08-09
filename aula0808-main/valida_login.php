<!DOCTYPE html>
<html lang="en">

    <head> 
        <meta charset="utf-8" />
        <title>Ateliê Aline Nacur</title>
    </head>

<body> 

    <?php
        session_start();
        $_SESSION['X'] = 'Seção oficialmente aberta';
        print_r($_SESSION['X']);
        echo '<hr>';

        $usuario_autenticator = false; 

        $file = 'usuarios.txt';
        $usuarios_app = [];
        if (file_exists($file)) {
            $lines = file($file, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $line) {
                list($email, $senha_hash) = explode(':', $line);
                $usuarios_app[] = ['email' => $email, 'senha' => $senha_hash];
            }
        }

        foreach ($usuarios_app as $user) {
            if ($user['email'] === $_POST['email'] && password_verify($_POST['senha'], $user['senha'])) {
                $usuario_autenticator = true;
            }
        }

        if ($usuario_autenticator) {
            echo "Usuário Autenticado";
            $_SESSION['autenticado'] = 'SIM';
        } else {
            $_SESSION['autenticado'] = 'NAO';
            header('Location: index.php?login=erro');
        }
    ?>

</body>
    
</html>