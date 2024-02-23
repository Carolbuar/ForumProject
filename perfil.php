<html>
    <head>
        <meta charset="utf-8">
        <title>FORUM PROGRAMDORES</title>
    </head>
    <body>
        <?php
        session_start();
        include 'valida.php';
        include 'liga_bd.php';
        //crio a instrucao sql ir buscar o user selecionado
        $sql ="SELECT * FROM t_user WHERE id_user=".$_SESSION['id_user'];
        // a variavel resultado vai guardar todos os dados de todos os clientes
        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao)); 
        //enquanto conseguir ler dados do array resultado imprime
        $linha = mysqli_fetch_assoc($resultado);
        ?>
        <!-- o metodo post envia os dados de uma página para a outra de forma escondida
            o metodo get envia os dados para a página seguinte pela barra de endereço-->
        <form action="perfil2.php" method="post" name="novo_perfil">
            <p>Id:<input type="text" name="id_user" size="11" readonly value="<?php echo $linha['id_user'];?>"></p>
            <p>Nick:<input type="text" name="nick" size="20" required maxlength="20" readonly value="<?php echo $linha['nick'];?>"></p>
            <p>Nome:<input type="text" name="nome" size="100" required maxlength="100"value="<?php echo $linha['nome'];?>"></p>
            <p>Email:<input type="text" name="email" size="50" required maxlength="50" value="<?php echo $linha['email'];?>"></p>
            <p>Data de Nascimento:<input type="date" size="10" name="data_nasc" required maxlength="10" value="<?php echo $linha['data_nasc'];?>"><br><br>
            <p>Password:<input type="password" name="pass" size="20" required maxlength="20" value="<?php echo $linha['pass'];?>"><br><br>
            <p>Foto (url):<br>
            <textarea name="foto" cols="80" rows="4" ><?php echo $linha['foto'];?></textarea><br><br>
            <!--O botao submit envia os dados para a pagina inserir.php o reset limpa
                os dados de todos os campos -->
            <input type="submit" value="Alterar">
            <br><br>
            <input type="reset" value="Limpar">
            <br><br>
            <input type="button" value="Voltar" onclick="window.history.go(-1)">
        </form>

    </body>
</html>