<html>
    <head>
        <meta charset="utf-8">
        <title>FORUM PROGRAMADORES</title>
    </head>
    <body>
        <?php
        session_start();
        include 'valida.php';
        include 'liga_bd.php';
        $sql ="SELECT * FROM t_post WHERE id_user=".$_SESSION['id_user'];
        $resultado =mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));
        $numreg=0;
        //enquanto conseguir ler dados do array resultado imprime
        while($linha = mysqli_fetch_assoc($resultado))
        {
            if ($linha['apagado']==0)
                echo "<font color='black'>";
            else
                echo "<font color='red'>";

            echo "<h3>Id Post: ".$linha['id_post']."</h3>";
            echo "<b>Tema: </b>".$linha['tema']."<br>";
            echo "<b>Titulo: </b>".$linha['titulo']."<br>";
            echo "<b>Texto: </b>".$linha['texto']."<br>";
            if($linha["foto"]!=null)
                echo "<b>Foto: </b><br><img src='".$linha['foto']."' height='100'><br><br>";
            echo "</font>";
            if ($linha['apagado']==0){
            ?>
            <form action="eliminarP.php" method="post">
                <input type="hidden" value="<?php echo $linha['id_post']?>" name="id_post">
                <input type="submit" value="Eliminar Post">
            </form>
            <?php
            }  if ($linha['apagado']==1){
            ?>
            <form action="recuperarP.php" method="post">
                <input type="hidden" value="<?php echo $linha['id_post']?>" name="id_post">
                <input type="submit" value="Recuperar Post">
            </form>
            <?php
            }
            if ($linha['apagado']>1)
                echo "<marquee><h1>Post Bloqueado pelo ADMIN</h1></marquee>";
            echo "<hr>";
            $numreg = $numreg+1;
        }
        echo "N. de Postagens > " .$numreg;
        
    mysqli_close($ligacao);
    ?>
        <br><br>
        <input type="button" value="Voltar ao menu" onclick="window.open('login2.php')">
    </body>
</html>