<html>
    <head>
        <meta charset="utf-8">
        <title>Gestão de utilizadores</title>
    </head>
    <body>
        <h1>Alterar Utilizadores</h1>
        <?php
        session_start();
        include 'valida.php'; 
        include 'liga_bd.php';
        $sql ="SELECT * FROM t_user WHERE id_user=".$_POST['id_user'];
        // a variavel resultado vai guardar todos os dados de todos os clientes
        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao)); 
        //enquanto conseguir ler dados do array resultado imprime
        $linha = mysqli_fetch_assoc($resultado);
        ?>
        <!-- o metodo post envia os dados de uma página para a outra de forma escondida
            o metodo get envia os dados para a página seguinte pela barra de endereço-->
        <form action="alterar_U2.php" method="post">
            <p>Id:<input type="text" name="id_user" size="11" readonly value="<?php echo $linha['id_user'];?>"></p>
            <p>Nick:<input type="text" name="nick" size="20" value="<?php echo $linha['nick'];?>"></p>
            <p>Nome:<input type="text" name="nome" size="100" value="<?php echo $linha['nome'];?>"></p>
            <p>Email:<input type="text" name="email" size="50" value="<?php echo $linha['email'];?>"></p>
            <p>Data de Nascimento:<input type="text" name="data_nasc" size="10" value="<?php echo $linha['data_nasc'];?>"><br><br>
            <p>Password:<input type="text" name="pass" size="20" value="<?php echo $linha['pass'];?>"><br><br>
            <p>Foto:<input type="textarea" name="foto" size="10" value="<?php echo $linha['foto'];?>"><br><br>
            <!--O botao submit envia os dados para a pagina inserir.php o reset limpa
                os dados de todos os campos -->
            <input type="submit" value="Alterar">
            <br><br>
            <a href="gerir_U.php" target="_self">Voltar ao menu</a>
        </form>
<?php
 mysqli_close($ligacao);
 ?>
    </body>
</html>