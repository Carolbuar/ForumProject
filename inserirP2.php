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
        <?php session_start();
        include 'valida.php';
        include 'liga_bd.php';
        $sql ="insert into t_post (tema,titulo,texto,foto,id_user) values(
        '$_POST[tema]',
        '$_POST[titulo]',
        '$_POST[texto]',
        '$_POST[foto]',
        $_POST[id_user])";
        
        // caso consiga executar a ação mostra a mensagem de sucesso
        if (mysqli_query($ligacao, $sql)){
            echo "<h1>post colocado com sucesso!</h1>";
        }
        mysqli_close($ligacao); 
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4>
        
    </body>
</html>