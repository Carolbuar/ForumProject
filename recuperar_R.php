<html>
    <head>
        <meta charset="utf-8">
        <title>FORUM PROGRAMADORES</title>
        <meta http-equiv="refresh" content="3;url=gerir_R.php">
    </head>
    <body>
        <?php
        session_start();
        include 'valida.php'; 
        include 'liga_bd.php';
        $sql ="UPDATE t_resp SET apagado=0 WHERE id_resp=".$_POST['id_resp'];

        if (mysqli_query($ligacao, $sql)){
            echo "<h1>Resposta recuperada com sucesso!</h1>";
        }
        mysqli_close($ligacao);
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4>
    </body>
</html>