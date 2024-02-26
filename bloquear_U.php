<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="static/images/forum.ico" type="image/x-icon">
        <title>Forum Programadores</title>
        <link rel="stylesheet" href="style.css">
        <meta http-equiv="refresh" content="3;url=gerir_u.php">
    </head>
    <body>
        <h1>BLOQUEAR UTILIZADOR</h1>
        <hr>
        <br>
        <?php
        session_start();
        include 'valida.php'; 
        include 'liga_bd.php';
        $sql ="UPDATE t_user SET
        apagado=1 WHERE  id_user=$_POST[id_user]";

        if (mysqli_query($ligacao, $sql))
            echo "<h3>Utilizador bloqueado com sucesso!</h3>"; 
        mysqli_close($ligacao); echo "<br/>";
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4>
    </body>
</html>