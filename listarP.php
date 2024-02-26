<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="static/images/forum.ico" type="image/x-icon">
        <title>Forum Programadores</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        session_start();
        include 'valida.php';
        include 'liga_bd.php';
        include 'filtra_P.php';
        
        $resultado =mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));
        $numreg=0;
        //enquanto conseguir ler dados do array resultado imprime
        while($linha = mysqli_fetch_assoc($resultado))
        {
            echo "<h3>Id Post: ".$linha['id_post']."</h3>";
            echo "<b>Tema: </b>".$linha['tema']."<br>";
            echo "<b>Titulo: </b>".$linha['titulo']."<br>";
            echo "<b>Texto: </b>".$linha['texto']."<br>";
            if($linha["foto"]!=null)
                echo "<b>Foto: </b><br><img src='".$linha['foto']."' height='100'><br><br>";

        $sql2 ="SELECT * FROM t_user WHERE id_user= ".$linha['id_user'];
        $resultado2 = mysqli_query($ligacao, $sql2) or die(mysqli_error($ligacao));
        $linha2 = mysqli_fetch_assoc($resultado2);
        echo "<h3>Nick: ".$linha2['nick']."</h3>";
        ?>
        <form action="inserirR.php" method="post">
            <input type="hidden" value="<?php echo $linha['id_post']?>" name="id_post">
            <input type="submit" value="Ver respostas / responder">
        </form>
        <?php
        echo "<hr>";
        $numreg = $numreg + 1;
        }
        echo"N. de Postagens > ".$numreg;
        mysqli_close($ligacao);
    ?>
        <br><br>
        <input type="button" value="Voltar ao menu" onclick="window.location.href='login2.php'">
    </body>
</html>