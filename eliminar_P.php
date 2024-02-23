<html>
    <head>
        <meta charset="utf-8">
        <title>FORUM PROGRAMADORES</title>
        <meta http-equiv="refresh" content="3;url=gerir_P.php">
    </head>
    <body>
        <?php
        session_start();
        include 'valida.php'; 
        include 'liga_bd.php';
        $sql ="UPDATE t_post SET apagado=1 WHERE id_post=".$_POST['id_post'];

        if (mysqli_query($ligacao, $sql)){
            echo "<h1>Post removido com sucesso!</h1>";
        }
        mysqli_close($ligacao);
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4>
    </body>
</html>