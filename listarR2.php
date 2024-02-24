<html>
    <head>
        <meta charset="utf-8">
        <title>FORUM PROGRAMADORES</title>
        <meta http-equiv="refresh" content="2;url=login2.php">
    </head>
    <body>
        <?php
        session_start();
        include 'valida.php';
        include 'liga_bd.php';
        $sql ="insert into t_post (tema,titulo,texto,foto,id_user) values(
        '$_POST[tema]',
        '$_POST[titulo]',
        '$_POST[texto]',
        '$_POST[foto]',
        $_POST[id])";
        
        // caso consiga executar a ação mostra a mensagem de sucesso
        if (mysqli_query($ligacao, $sql)){
            echo "<h1>post colocado com sucesso!</h1>"; 
        }
        mysqli_close($ligacao); 
        ?>
            <input type="button" value="Continuar" onclick="window.history.go(-2)">
    </body>
</html>