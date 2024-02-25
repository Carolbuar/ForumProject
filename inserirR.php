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
        $sql ="SELECT * FROM t_post WHERE id_post=".$_POST['id_post'];
        $resultado =mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));
        $numreg=0;
        
        $linha = mysqli_fetch_assoc($resultado);
        echo "Id Post: ".$linha['id_post']."<br>";
        echo "Tema: ".$linha['tema']."<br>";
        echo "Titulo: ".$linha['titulo']."<br>";
        echo "Texto: ".$linha['texto']."<br>";
        if($linha["foto"]!=null)
            echo "Foto: <br> <img src='".$linha['foto']."' height='100'><br><br>";

        //procurar o utilizador pelo id
        $sql2 ="SELECT * FROM t_user WHERE id_user= ".$linha['id_user'];
        $resultado2 = mysqli_query($ligacao, $sql2) or die(mysqli_error($ligacao));
        $linha2 = mysqli_fetch_assoc($resultado2);
        echo "Nick: ".$linha2['nick']."<br>";

        $numresp=0;
        $sql3 ="SELECT * FROM t_resp WHERE apagado=0 and id_post= ".$linha['id_post'];
        $resultado3 = mysqli_query($ligacao, $sql3) or die(mysqli_error($ligacao));

        echo "<table width='80%' align='center' border='1'>";
        //repete este ciclo enquanto houver linhas
        while($linha3 = mysqli_fetch_assoc($resultado3))
        {
            echo "<tr><td>".$linha3['texto']."</td>";
            if($linha["foto"]!=null)
                echo "<td><img src='".$linha3['foto']."' height='100'></td>";

            $sql4 ="SELECT * FROM t_user WHERE id_user= ".$linha3['id_user'];
            $resultado4 = mysqli_query($ligacao, $sql4) or die(mysqli_error($ligacao));
            $linha4 = mysqli_fetch_assoc($resultado4);
            echo "<td>".$linha4['nick']."</td></tr>";
            $numresp++;
        }
        echo "<tr><td colspan='3' align='center'>Total de respostas:".$numresp."</td></tr>";
        echo "</table>";
            //fim das respostas
            ?>

        <h2>Responder ao Post</h2>
        <form action="inserirR2.php" method="POST" name="f1">
        <input type="hidden" size="20" maxlegth="20" name="id_user" readonly value="<?php echo $_SESSION['id_user']?>">
        <input type="hidden" name="id_post" readonly value="<?php echo $linha['id_post']?>">
        Texto:<br><textarea cols="80" rows="4" name="texto"></textarea><br><br>
        Foto(url):<br><textarea cols="80" rows="4" name="foto"></textarea><br><br>
        
        <input type="submit" value="Responder"><br><br>
        <input type="reset" value="Limpar"><br><br>
        <input type="button" value="Voltar" onclick="window.history.go(-1);">
        </form>

       <?php
       mysqli_close($ligacao);
       ?> 
       
    </body>
</html>