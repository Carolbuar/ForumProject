<html>
    <head>
        <meta charset="utf-8">
        <title>FORUM PROGRAMADORES</title>
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

        // caso consiga executar a ação mostra a mensagem de sucesso
        if (mysqli_query($ligacao, $sql)){
            echo "<h3>Dados alterados com sucesso!</h3>"; 
        }
        mysqli_close($ligacao); 
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4>
    </body>
</html>