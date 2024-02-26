<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="static/images/forum.ico" type="image/x-icon">
        <title>Forum Programadores</title>
        <link rel="stylesheet" href="style.css">
        <meta http-equiv="refresh" content="3;url=login2.php">
    </head>
    <body>
        <?php
        session_start();
        include 'valida.php';
        include 'liga_bd.php';

        $sql ="UPDATE t_user SET
        nome='$_POST[nome]',
        email='$_POST[email]',
        data_nasc='$_POST[data_nasc]',
        pass='$_POST[pass]',
        foto='$_POST[foto]'  
        WHERE id_user=".$_SESSION['id_user'];

        if (mysqli_query($ligacao, $sql)){
            echo "<h3>Dados alterados com sucesso!</h3>"; 
        }
        mysqli_close($ligacao); 
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4>
    </body>
</html>