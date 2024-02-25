<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" href="static/images/forum.ico" type="image/x-icon">
        <title>Forum Programadores</title>
    </head>
    <body>
        <?php
        session_start();
        include 'valida.php';
        include 'liga_bd.php';
        $sql ="SELECT * FROM t_resp WHERE id_user=".$_SESSION['id_user'];
        $resultado =mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));
        $numreg=0;
        //enquanto conseguir ler dados do array resultado imprime
        while($linha = mysqli_fetch_assoc($resultado))
        {
            if ($linha['apagado']==0)
                echo "<font color='black'>";
            else
                echo "<font color='red'>";

            echo "<h3>Id Resposta: ".$linha['id_resp']."</h3>";
            echo "<b>Texto: </b>".$linha['texto']."<br>";
            if($linha["foto"]!=null)
                echo "<b>Foto</b><br> <img height=100 src='" . $linha["foto"] . "'> <br><br>";
            echo "<h2>Respostas a: </h2>";

            $sql2 ="SELECT * FROM t_post WHERE id_post=".$linha['id_post'];
            $resultado2 =mysqli_query($ligacao, $sql2) or die (mysqli_error($ligacao));
            $linha2=mysqli_fetch_assoc($resultado2);
            echo "<b>Titulo: </b>".$linha2['titulo']."<br>";
            echo "<b>Tema: </b>".$linha2['tema']."<br>";
            echo "<b>Texto: </b>".$linha2['texto']."<br>";
            if($linha2["foto"]!=null)
                echo "<b>Foto</b><br> <img height=100 src='" . $linha2["foto"] . "'> <br><br>";
            echo "</font>";
            echo "<br>";


            if ($linha['apagado']==0){
            ?>
            <form action="eliminarR.php" method="post">
                <input type="hidden" value="<?php echo $linha['id_resp']?>" name="id_resp">
                <input type="submit" value="Eliminar Resposta">
            </form>
            <?php
            }  if ($linha['apagado']==1){
            ?>
            <form action="recuperarR.php" method="post">
                <input type="hidden" value="<?php echo $linha['id_resp']?>" name="id_resp">
                <input type="submit" value="Recuperar Resposta">
            </form>
            <?php
            }
            if ($linha['apagado']>1)
                echo "<marquee><h1>Post Bloqueado pelo ADMIN</h1></marquee>";
            echo "<hr>";
            $numreg = $numreg+1;
        }
        
                
    mysqli_close($ligacao);
    ?>
        <br><br>
        <input type="button" value="Voltar ao menu" onclick="window.open('login2.php')">
    </body>
</html>