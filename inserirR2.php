<html>
    <head>
        <meta charset="utf-8">
        <title>FORUM PROGRAMADORES</title>
        <meta http-equiv="refresh" content="3;url=listarP.php">
    </head>
    <body>
        <?php
        session_start();
        include 'valida.php';
        include 'liga_bd.php';
        if(!$ligacao){
            die ("Erro na ligacao".mysqli_connect_error());
        }
        $sql = "INSERT INTO t_resp (id_post, id_user, texto,foto) VALUES (
        $_POST[id_post],
        $_POST[id_user],
        '$_POST[texto]',
        '$_POST[foto]')";
        
        // caso consiga executar a ação mostra a mensagem de sucesso
        if (mysqli_query($ligacao, $sql)){
            echo "<h1>Resposta colocada com sucesso!</h1>"; 
        }
        mysqli_close($ligacao); 
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4>
    </body>
</html>